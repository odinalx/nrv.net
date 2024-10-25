import { templates } from './templateLoader.js';
import { SpectacleService } from './spectacleService.js';
import { SpectacleFilter } from './spectacleFilter.js';
import { DateUtils } from './dateUtils.js';
import { PageManager } from './pageManager.js';

class SPA {
    constructor() {
        this.contentDiv = document.getElementById('content');
        this.pageManager = new PageManager(this.contentDiv, templates);
        this.spectacleFilter = new SpectacleFilter();
        this.originalSpectacles = [];
        
        this.initializeEventListeners();
        this.pageManager.navigateToPage('home');
    }

    async fetchSpectacleData() {
        try {
            const data = await SpectacleService.fetchSpectacles();
            this.originalSpectacles = DateUtils.sortByDate(data.spectacles || []);
            this.updateSpectacleDisplay();
        } catch (error) {
            console.error('Erreur lors de la récupération des données:', error);
            this.updateSpectacleDisplay();
        }
    }

    async fetchSoireeData(soireeUrl) {
        try {
            const soireeData = await SpectacleService.fetchSoiree(soireeUrl);
            this.pageManager.setPageData('soiree', {
                title: "Détails de la soirée",
                soiree: soireeData
            });
            this.pageManager.navigateToPage('soiree');
        } catch (error) {
            console.error('Erreur lors de la récupération des données de la soirée:', error);
        }
    }

    updateSpectacleDisplay() {
        if (this.originalSpectacles) {
            this.pageManager.setPageData('spectacle', {
                activeFilter: this.spectacleFilter.activeFilter,
                selectedDate: this.spectacleFilter.selectedDate,
                selectedLieu: this.spectacleFilter.selectedLieu,
                selectedStyle: this.spectacleFilter.selectedStyle,
                availableDates: DateUtils.getAvailableDates(this.originalSpectacles),
                availableLieux: this.spectacleFilter.getAvailableLieux(this.originalSpectacles),
                availableStyles: this.spectacleFilter.getAvailableStyles(this.originalSpectacles),
                spectacles: this.spectacleFilter.filterSpectacles(this.originalSpectacles)
            });
            this.pageManager.navigateToPage('spectacle');
        }
    }

    initializeEventListeners() {
        document.querySelectorAll('button[data-page]').forEach(button => {
            button.addEventListener('click', async (e) => {
                const pageName = e.target.dataset.page;
                if (pageName === 'spectacle') {
                    await this.fetchSpectacleData();
                }
                this.pageManager.navigateToPage(pageName);
            });
        });

        this.contentDiv.addEventListener('click', async (e) => {
            if (e.target.matches('.filter-type-button')) {
                this.spectacleFilter.updateFilter('filterType', e.target.dataset.filterType);
                this.updateSpectacleDisplay();
            }
            
            if (e.target.matches('.date-button')) {
                this.spectacleFilter.updateFilter('date', e.target.dataset.date);
                this.updateSpectacleDisplay();
            }

            if (e.target.matches('.lieu-button')) {
                this.spectacleFilter.updateFilter('lieu', e.target.dataset.lieu);
                this.updateSpectacleDisplay();
            }

            if (e.target.matches('.style-button')) {
                this.spectacleFilter.updateFilter('style', e.target.dataset.style);
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
}

document.addEventListener('DOMContentLoaded', () => {
    new SPA();
});