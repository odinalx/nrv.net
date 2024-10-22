import Handlebars from 'handlebars';
import homeTemplate from '../templates/home.hbs';
import aboutTemplate from '../templates/about.hbs';
import contactTemplate from '../templates/contact.hbs';

// Compilation des templates
export const templates = {
    home: Handlebars.compile(homeTemplate),
    about: Handlebars.compile(aboutTemplate),
    contact: Handlebars.compile(contactTemplate)
};

// Helpers Handlebars personnalisés (optionnel)
Handlebars.registerHelper('formatDate', function(date) {
    return new Date(date).toLocaleDateString();
});

Handlebars.registerHelper('uppercase', function(text) {
    return text.toUpperCase();
});