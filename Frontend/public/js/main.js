import { templates } from './templateLoader';

class SPA {
    constructor() {
        this.contentDiv = document.getElementById('content');
        this.templates = templates;
        
        this.pageData = {
            home: {
                title: "Notre NRV",
                description: "Bienvenue sur notre application mono-page NRV!",
            },
            spectacle: null,
            soiree: null
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
            
            const spectacles = data.spectacles || [];
            
            this.pageData.spectacle = {
                title: "Nos Spectacles",
                description: "Découvrez notre programmation",
                style: "Style unique",
                spectacles: spectacles.map(spectacle => ({
                    titre: spectacle.titre,
                    date: spectacle.date,
                    horaire: spectacle.horaire,
                    soiree: spectacle.soiree
                }))
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

    async fetchSoireeData(soireeUrl) {
        try {
            // Enlever le premier "/" de l'URL si présent
            const cleanUrl = soireeUrl.startsWith('/') ? soireeUrl.slice(1) : soireeUrl;
            const response = await fetch(`http://localhost:7080/${cleanUrl}`);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const soireeData = await response.json();
            
            this.pageData.soiree = {
                title: "Détails de la soirée",
                soiree: soireeData
            };
            
            this.navigateToPage('soiree');
        } catch (error) {
            console.error('Erreur lors de la récupération des données de la soirée:', error);
        }
    }

    initializeEventListeners() {
        // Gestion de la navigation principale
        document.querySelectorAll('button[data-page]').forEach(button => {
            button.addEventListener('click', async (e) => {
                const pageName = e.target.dataset.page;
                if (pageName === 'spectacle') {
                    await this.fetchSpectacleData();
                }
                this.navigateToPage(pageName);
            });
        });

        // Délégation d'événements pour les clics sur les spectacles
        this.contentDiv.addEventListener('click', async (e) => {
            const spectacleCard = e.target.closest('.spectacle-card');
            if (spectacleCard) {
                const soireeUrl = spectacleCard.dataset.soireeId;
                if (soireeUrl) {
                    await this.fetchSoireeData(soireeUrl);
                }
            }
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