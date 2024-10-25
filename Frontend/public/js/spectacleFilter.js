import { DateUtils } from './dateUtils.js';

export class SpectacleFilter {
    constructor() {
        this.activeFilter = 'dates';
        this.selectedDate = 'all';
        this.selectedLieu = 'all';
        this.selectedStyle = 'all';
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

        return DateUtils.sortByDate(filtered);
    }

    getAvailableLieux(spectacles) {
        return [...new Set(spectacles.map(s => s.soiree.lieu))].sort();
    }
    
    getAvailableStyles(spectacles) {
        return [...new Set(spectacles.map(s => s.style))].sort();
    }

    updateFilter(type, value) {
        switch(type) {
            case 'filterType':
                this.activeFilter = value;
                break;
            case 'date':
                this.selectedDate = value;
                break;
            case 'lieu':
                this.selectedLieu = value;
                break;
            case 'style':
                this.selectedStyle = value;
                break;
        }
    }
}
