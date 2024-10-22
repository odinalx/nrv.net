import { templates } from './templateLoader';

class SPA {
    constructor() {
        this.contentDiv = document.getElementById('content');
        this.templates = templates;
        
        // Données pour chaque page
        this.pageData = {
            home: {
                title: 'NRV.net',
                description: 'Bienvenue sur le site boutique nrv!'
            },

        };

        this.initializeEventListeners();
        this.navigateToPage('home');
    }

    initializeEventListeners() {
        // Gestion de la navigation
        document.querySelectorAll('button[data-page]').forEach(button => {
            button.addEventListener('click', (e) => {
                this.navigateToPage(e.target.dataset.page);
            });
        });
    }
    navigateToPage(pageName) {
        if (this.templates[pageName]) {
            const html = this.templates[pageName](this.pageData[pageName]);
            this.contentDiv.innerHTML = html;
        }
    }
}

// Initialisation de l'application
document.addEventListener('DOMContentLoaded', () => {
    new SPA();
});