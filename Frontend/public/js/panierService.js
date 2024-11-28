import { API_CONFIG, ApiService } from './api.js';

export class PanierService {
    static async creerPanier(user_id) {
        try {
            const data = { user_id: user_id };
            console.log("Envoi de la requête de création de panier avec les données :", data);
            
            const response = await ApiService.post(`/paniers`, data, true);
            return response;
        } catch (error) {
            console.error("Erreur lors de la création du panier:", error);
            throw error;
        }
    }

    static async ajouterBillet(panierId, billetId, quantite, prix) {
        try {
            const data = {  
                billet_id: billetId,
                quantite: quantite,
                prix: prix
            };
            console.log("Envoi de la requête d'ajout de billet avec les données :", data);
            
            const response = await ApiService.post(`/paniers/${panierId}/billets`, data, true);
            return response;
        } catch (error) {
            console.error("Erreur lors de l'ajout d'un billet au panier:", error);
            throw error;
        }
    }

    static async supprimerBillet(panierId, billetId) {
        try {
            console.log(`Envoi de la requête de suppression pour le billet ${billetId} du panier ${panierId}`);
            const response = await ApiService.delete(`/paniers/${panierId}/billets/${billetId}`, true);
            return response;
        } catch (error) {
            console.error("Erreur lors de la suppression d'un billet du panier:", error);
            throw error;
        }
    }

    static async recupererPanier(userId) {
        try {
            console.log(`Récupération du panier pour l'utilisateur ${userId}`);
            const response = await ApiService.get(`/users/${userId}/panier`, true);
            return response;
        } catch (error) {
            console.error("Erreur lors de la récupération du panier:", error);
            throw error;
        }
    }

    static async validerPanier(panierId) {
        try {
            console.log(`Validation du panier ${panierId}`);
            const response = await ApiService.post(`/paniers/${panierId}/valider`, null, true);
            return response;
        } catch (error) {
            console.error("Erreur lors de la validation du panier:", error);
            throw error;
        }
    }
}
