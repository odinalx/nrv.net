import { templates } from './templateLoader';

class SPA {
    constructor() {
        this.contentDiv = document.getElementById('content');
        this.templates = templates;
        this.currentSortKey = 'date'; 
        this.sortOrder = 'asc'; 
        
        this.pageData = {
            home: {
                title: "Notre NRV",
                description: "Bienvenue sur notre application mono-page NRV!",
            },
            spectacle: null,
            soiree: null
        };

        this.initializeEventListeners();
        this.navigateToPage('home');
    }

    sortSpectacles(spectacles, sortKey, order) {
        return [...spectacles].sort((a, b) => {
            let comparison = 0;
            switch (sortKey) {
                case 'date':
                    const [dayA, monthA, yearA] = a.date.split('-');
                    const [dayB, monthB, yearB] = b.date.split('-');
                    const dateA = new Date(`${yearA}-${monthA}-${dayA}`);
                    const dateB = new Date(`${yearB}-${monthB}-${dayB}`);
                    comparison = dateA - dateB;
                    break;
            }
            return order === 'asc' ? comparison : -comparison;
        });
    }

    async fetchSpectacleData() {
        try {
            const response = await fetch('http://localhost:7080/spectacles');
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const data = await response.json();
            
            const spectacles = data.spectacles || [];
            
            // Ajout des données de tri dans pageData
            this.pageData.spectacle = {
                currentSort: this.currentSortKey,
                sortOrder: this.sortOrder,
                spectacles: this.sortSpectacles(spectacles, this.currentSortKey, this.sortOrder)
            };
        } catch (error) {
            console.error('Erreur lors de la récupération des données:', error);
            this.pageData.spectacle = {
                currentSort: this.currentSortKey,
                sortOrder: this.sortOrder,
                spectacles: []
            };
        }
    }

    async fetchSoireeData(soireeUrl) {
        try {
            // Enlever le premier "/" de l'URL si présent
            const cleanUrl = soireeUrl.startsWith('/') ? soireeUrl.slice(1) : soireeUrl;
            const response = await fetch(`http://localhost:7080/${cleanUrl}`);
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

    initializeEventListeners() {
        // Gestion de la navigation principale
        document.querySelectorAll('button[data-page]').forEach(button => {
            button.addEventListener('click', async (e) => {
                const pageName = e.target.dataset.page;
                if (pageName === 'spectacle') {
                    await this.fetchSpectacleData();
                }
                this.navigateToPage(pageName);
            });
        });

        // Délégation d'événements pour les clics
        this.contentDiv.addEventListener('click', async (e) => {
            // Gestion du tri
            if (e.target.matches('.sort-btn')) {
                const sortKey = e.target.dataset.sortKey;
                if (sortKey === this.currentSortKey) {
                    this.sortOrder = this.sortOrder === 'asc' ? 'desc' : 'asc';
                } else {
                    this.currentSortKey = sortKey;
                    this.sortOrder = 'asc';
                }
                
                if (this.pageData.spectacle && this.pageData.spectacle.spectacles) {
                    this.pageData.spectacle.spectacles = this.sortSpectacles(
                        this.pageData.spectacle.spectacles,
                        this.currentSortKey,
                        this.sortOrder
                    );
                    this.pageData.spectacle.currentSort = this.currentSortKey;
                    this.pageData.spectacle.sortOrder = this.sortOrder;
                    this.navigateToPage('spectacle');
                }
            }
            
            // Gestion du clic sur une carte de spectacle
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

// Initialisation de l'application
document.addEventListener('DOMContentLoaded', () => {
    new SPA();
});

