import { templates } from './templateLoader';

class SPA {
    constructor() {
        this.contentDiv = document.getElementById('content');
        this.templates = templates;
        
        // Données pour chaque page
        this.pageData = {
            home: {
                title: "Notre NRV",
                description: "Bienvenue sur notre application mono-page NRV!",
            },
            spectacle: null  // Sera rempli par l'API
        };

        this.initializeEventListeners();
        this.navigateToPage('home');
    }

    async fetchSpectacleData() {
        try {
            const response = await fetch('http://localhost:7080/spectacles');
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const data = await response.json();
            this.pageData.spectacle = {
                title: "Nos Spectacles",
                description: "Découvrez notre programmation",
                style: "Style unique",
                spectacles: data // Supposant que l'API renvoie un tableau de spectacles
            };
        } catch (error) {
            console.error('Erreur lors de la récupération des données:', error);
            this.pageData.spectacle = {
                title: "Nos Spectacles",
                description: "Erreur lors du chargement des spectacles",
                style: "Style unique",
                spectacles: []
            };
        }
    }

    initializeEventListeners() {
        // Gestion de la navigation
        document.querySelectorAll('button[data-page]').forEach(button => {
            button.addEventListener('click', async (e) => {
                const pageName = e.target.dataset.page;
                if (pageName === 'spectacle') {
                    await this.fetchSpectacleData(); // Récupère les données avant d'afficher la page
                }
                this.navigateToPage(pageName);
            });
        });
    }

    navigateToPage(pageName) {
        if (this.templates[pageName]) {
            const pageData = this.pageData[pageName];
            if (pageData) {
                const html = this.templates[pageName](pageData);
                this.contentDiv.innerHTML = html;
            }
        }
    }
}

// Initialisation de l'application
document.addEventListener('DOMContentLoaded', () => {
    new SPA();
});