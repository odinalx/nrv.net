import Handlebars from 'handlebars';
import homeTemplate from '../templates/home.hbs';
import spectacleTemplate from '../templates/spectacle.hbs';
import soireeTemplate from '../templates/soiree.hbs';

// Helper pour le formatage des dates standard
Handlebars.registerHelper('formatDate', function(dateStr) {
    const [day, month, year] = dateStr.split('-');
    return new Date(`${year}-${month}-${day}`).toLocaleDateString('fr-FR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });
});

Handlebars.registerHelper('formatDateButton', function(dateStr) {
    const [day, month, year] = dateStr.split('-');
    const date = new Date(`${year}-${month}-${day}`);
    const days = ['DIM', 'LUN', 'MAR', 'MER', 'JEU', 'VEN', 'SAM'];
    const months = ['JAN', 'FEV', 'MAR', 'AVR', 'MAI', 'JUIN', 'JUIL', 'AOUT', 'SEP', 'OCT', 'NOV', 'DEC'];
    return `${days[date.getDay()]} ${day} ${months[date.getMonth()]}`;
});

Handlebars.registerHelper('formatTime', function(timeStr) {
    if (!timeStr) return '';
    
    const [hours, minutes] = timeStr.split(':');
    
    if (minutes === '00') {
        return `${parseInt(hours)}H`;
    }
    
    return `${parseInt(hours)}H${minutes}`;
});

Handlebars.registerHelper('eq', function(a, b) {
    return a === b;
});

export const templates = {
    home: Handlebars.compile(homeTemplate),
    spectacle: Handlebars.compile(spectacleTemplate),
    soiree: Handlebars.compile(soireeTemplate)
};