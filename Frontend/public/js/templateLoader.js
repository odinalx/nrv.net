import Handlebars from 'handlebars';
import homeTemplate from '../templates/home.hbs';

// Compilation des templates
export const templates = {
    home: Handlebars.compile(homeTemplate),
};

// Helpers Handlebars personnalisés (optionnel)
Handlebars.registerHelper('formatDate', function(date) {
    return new Date(date).toLocaleDateString();
});

Handlebars.registerHelper('uppercase', function(text) {
    return text.toUpperCase();
});