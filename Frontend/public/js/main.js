import { templates } from './templateLoader';

class SPA {
    constructor() {
        this.contentDiv = document.getElementById('content');
        this.templates = templates;
        this.activeFilter = 'dates';
        this.selectedDate = 'all';
        this.selectedLieu = 'all';
        this.selectedStyle = 'all';
        this.originalSpectacles = [];
        
        this.pageData = {
            home: {
                title: "Notre NRV",
                description: "Bienvenue sur notre application mono-page NRV!"
            },
            spectacle: null,
            soiree: null
        };

        this.initializeEventListeners();
        this.navigateToPage('home');
    }

    getAvailableDates(spectacles) {
        return [...new Set(spectacles.map(s => s.date))].sort((a, b) => {
            const [dayA, monthA, yearA] = a.split('-');
            const [dayB, monthB, yearB] = b.split('-');
            const dateA = new Date(`${yearA}-${monthA}-${dayA}`);
            const dateB = new Date(`${yearB}-${monthB}-${dayB}`);
            return dateA - dateB;
        });
    }

    getAvailableLieux(spectacles) {
        return [...new Set(spectacles.map(s => s.soiree.lieu))].sort();
    }
    getAvailableStyles(spectacles) {
        return [...new Set(spectacles.map(s => s.style))].sort();
    }

    filterSpectacles(spectacles) {
        let filtered = [...spectacles];

        if (this.activeFilter === 'dates' && this.selectedDate !== 'all') {
            filtered = filtered.filter(s => s.date === this.selectedDate);
        }

        if (this.activeFilter === 'lieux' && this.selectedLieu !== 'all') {
            filtered = filtered.filter(s => s.soiree.lieu === this.selectedLieu);
        }

        if (this.activeFilter === 'styles' && this.selectedStyle !== 'all') {
            filtered = filtered.filter(s => s.style === this.selectedStyle);
        }

        return filtered;
    }

    async fetchSpectacleData() {
        try {
            const response = await fetch('http://localhost:48013/spectacles');
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const data = await response.json();
            
            this.originalSpectacles = data.spectacles || [];
            
            this.updateSpectacleDisplay();
        } catch (error) {
            console.error('Erreur lors de la récupération des données:', error);
            this.pageData.spectacle = {
                activeFilter: this.activeFilter,
                selectedDate: this.selectedDate,
                selectedLieu: this.selectedLieu,
                availableDates: [],
                availableLieux: [],
                spectacles: []
            };
        }
    }

    async fetchSoireeData(soireeUrl) {
        try {
            const cleanUrl = soireeUrl.startsWith('/') ? soireeUrl.slice(1) : soireeUrl;
            const response = await fetch(`http://localhost:48013/${cleanUrl}`);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const soireeData = await response.json();
            this.pageData.soiree = {
                title: "Détails de la soirée",
                soiree: soireeData
            };
            
            this.navigateToPage('soiree');
        } catch (error) {
            console.error('Erreur lors de la récupération des données de la soirée:', error);
        }
    }

    updateSpectacleDisplay() {
        if (this.originalSpectacles) {
            this.pageData.spectacle = {
                activeFilter: this.activeFilter,
                selectedDate: this.selectedDate,
                selectedLieu: this.selectedLieu,
                selectedStyle: this.selectedStyle,
                availableDates: this.getAvailableDates(this.originalSpectacles),
                availableLieux: this.getAvailableLieux(this.originalSpectacles),
                availableStyles: this.getAvailableStyles(this.originalSpectacles),
                spectacles: this.filterSpectacles(this.originalSpectacles)
            };
            this.navigateToPage('spectacle');
        }
    }

    initializeEventListeners() {
        document.querySelectorAll('button[data-page]').forEach(button => {
            button.addEventListener('click', async (e) => {
                const pageName = e.target.dataset.page;
                if (pageName === 'spectacle') {
                    await this.fetchSpectacleData();
                }
                this.navigateToPage(pageName);
            });
        });

        this.contentDiv.addEventListener('click', async (e) => {
            if (e.target.matches('.filter-type-button')) {
                const filterType = e.target.dataset.filterType;
                this.activeFilter = filterType;
                this.updateSpectacleDisplay();
            }
            
            if (e.target.matches('.date-button')) {
                this.selectedDate = e.target.dataset.date;
                this.updateSpectacleDisplay();
            }

            if (e.target.matches('.lieu-button')) {
                this.selectedLieu = e.target.dataset.lieu;
                this.updateSpectacleDisplay();
            }

            if (e.target.matches('.style-button')) {
                this.selectedStyle = e.target.dataset.style;
                this.updateSpectacleDisplay();
            }
            
            const spectacleCard = e.target.closest('.spectacle-card');
            if (spectacleCard) {
                const soireeUrl = spectacleCard.dataset.soireeId;
                if (soireeUrl) {
                    await this.fetchSoireeData(soireeUrl);
                }
            }
        });
    }

    navigateToPage(pageName) {
        if (this.templates[pageName]) {
            const pageData = this.pageData[pageName];
            if (pageData) {
                const html = this.templates[pageName](pageData);
                this.contentDiv.innerHTML = html;
            }
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new SPA();
});