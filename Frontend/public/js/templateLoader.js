import Handlebars from 'handlebars';
import homeTemplate from '../templates/home.hbs';
import spectacleTemplate from '../templates/spectacle.hbs';

// Compilation des templates
export const templates = {
    home: Handlebars.compile(homeTemplate),
    spectacle: Handlebars.compile(spectacleTemplate),
};

// Helpers Handlebars personnalisés (optionnel)
Handlebars.registerHelper('formatDate', function(date) {
    return new Date(date).toLocaleDateString();
});

Handlebars.registerHelper('uppercase', function(text) {
    return text.toUpperCase();
});