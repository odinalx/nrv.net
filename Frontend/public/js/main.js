import { templates } from './templateLoader';

class SPA {
    constructor() {
        this.contentDiv = document.getElementById('content');
        this.templates = templates;
        
        // Données pour chaque page
        this.pageData = {
            home: {
                title: "Notre SPA",
                description: "Bienvenue sur notre application mono-page !",
                items: [
                    { name: "Item 1", description: "Description de l'item 1" },
                    { name: "Item 2", description: "Description de l'item 2" }
                ]
            },
            about: {
                aboutText: "Nous sommes une entreprise innovante...",
                team: [
                    { name: "Alice Dupont", role: "CEO" },
                    { name: "Bob Martin", role: "CTO" }
                ]
            },
            contact: {}
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

        // Gestion du formulaire de contact
        document.addEventListener('submit', (e) => {
            if (e.target.id === 'contact-form') {
                e.preventDefault();
                const formData = new FormData(e.target);
                console.log('Formulaire soumis:', Object.fromEntries(formData));
                alert('Message envoyé !');
            }
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