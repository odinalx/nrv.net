import { SpectacleService } from './spectacleService.js';
import { DateUtils } from './dateUtils.js';

export class SpectacleController {
    constructor(pageManager, spectacleFilter) {
        this.pageManager = pageManager;
        this.spectacleFilter = spectacleFilter;
        this.originalSpectacles = [];
    }

    async fetchSpectacleData() {
        try {
            const data = await SpectacleService.fetchSpectacles();
            this.originalSpectacles = DateUtils.sortByDate(data.spectacles || []);
            this.updateSpectacleDisplay();
        } catch (error) {
            console.error('Erreur lors de la récupération des données:', error);
            if (error.message === 'Authentication required') {
                this.pageManager.navigateToPage('connexion');
            } else {
                this.updateSpectacleDisplay();
            }
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
            if (error.message === 'Authentication required') {
                this.pageManager.navigateToPage('connexion');
            }
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
}
