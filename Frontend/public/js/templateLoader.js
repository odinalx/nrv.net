import Handlebars from 'handlebars';
import homeTemplate from '../templates/home.hbs';
import spectacleTemplate from '../templates/spectacle.hbs';

// Helpers pour le formatage des dates et heures
Handlebars.registerHelper('formatDate', function(dateStr) {
    const [day, month, year] = dateStr.split('-');
    return new Date(`${year}-${month}-${day}`).toLocaleDateString('fr-FR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });
});

Handlebars.registerHelper('formatTime', function(timeStr) {
    return timeStr.slice(0, 5); // Garde seulement HH:MM
});

export const templates = {
    home: Handlebars.compile(homeTemplate),
    spectacle: Handlebars.compile(spectacleTemplate),
};