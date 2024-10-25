import { SpectacleService } from './spectacleService.js';
import { DateUtils } from './dateUtils.js';
import { authService } from './authService.js';
import { PanierService } from './panierService.js';

export class SpectacleController {
    constructor(pageManager, spectacleFilter) {
        this.pageManager = pageManager;
        this.spectacleFilter = spectacleFilter;
        this.originalSpectacles = [];
    }

    async fetchSpectacleData() {
        try {
            const data = await SpectacleService.fetchSpectacles();
            this.originalSpectacles = DateUtils.sortByDate(data.spectacles || []);
            this.updateSpectacleDisplay();
        } catch (error) {
            console.error('Erreur lors de la récupération des données:', error);
            if (error.message === 'Authentication required') {
                this.pageManager.navigateToPage('connexion');
            } else {
                this.updateSpectacleDisplay();
            }
        }
    }

    async fetchSoireeData(soireeUrl) {
        try {
            const soireeData = await SpectacleService.fetchSoiree(soireeUrl);
            this.pageManager.setPageData('soiree', {
                title: "Détails de la soirée",
                soiree: soireeData
            });
            this.pageManager.navigateToPage('soiree');

            const form = document.getElementById('add-to-cart-form');
            if (form) {
                form.addEventListener('submit', this.handleAddToCartForm.bind(this, soireeData.id));
            } else {
                console.warn("Formulaire 'Ajouter au panier' non trouvé.");
            }
        } catch (error) {
            console.error('Erreur lors de la récupération des données de la soirée:', error);
            if (error.message === 'Authentication required') {
                this.pageManager.navigateToPage('connexion');
            }
        }
    }

    async handleAddToCartForm(soireeId, event) {
        event.preventDefault();

        const ticketTypeElement = document.getElementById('ticket-type');
        const prix = parseFloat(ticketTypeElement.selectedOptions[0].getAttribute('data-price'));
        const quantite = parseInt(document.getElementById('ticket-quantity').value, 10);

        if (isNaN(quantite) || quantite < 1) {
            alert("Veuillez entrer une quantité valide.");
            return;
        }

        if (!authService.isAuthenticated()) {
            alert("Vous devez être connecté pour ajouter un billet au panier.");
            return;
        }

        let panierId = localStorage.getItem('panier_id');

        try {
            if (!panierId) {
                const panierResponse = await PanierService.creerPanier(authService.getUserId());
                if (panierResponse && panierResponse.id) {
                    panierId = panierResponse.id;
                    localStorage.setItem('panier_id', panierId);
                }
            }

            await PanierService.ajouterBillet(panierId, soireeId, quantite, prix);
            alert("Billet ajouté au panier avec succès !");
        } catch (error) {
            console.error("Erreur lors de l'ajout au panier:", error);
            alert("Une erreur s'est produite lors de l'ajout au panier.");
        }
    }

    updateSpectacleDisplay() {
        if (this.originalSpectacles) {
            this.pageManager.setPageData('spectacle', {
                activeFilter: this.spectacleFilter.activeFilter,
                selectedDate: this.spectacleFilter.selectedDate,
                selectedLieu: this.spectacleFilter.selectedLieu,
                selectedStyle: this.spectacleFilter.selectedStyle,
                availableDates: DateUtils.getAvailableDates(this.originalSpectacles),
                availableLieux: this.spectacleFilter.getAvailableLieux(this.originalSpectacles),
                availableStyles: this.spectacleFilter.getAvailableStyles(this.originalSpectacles),
                spectacles: this.spectacleFilter.filterSpectacles(this.originalSpectacles)
            });
            this.pageManager.navigateToPage('spectacle');
        }
    }
}
