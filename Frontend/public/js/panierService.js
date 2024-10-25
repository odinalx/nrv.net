import { API_CONFIG, ApiService } from './api.js';

export class PanierService {
    static async creerPanier(userId) {
        try {
            const data = { user_id: userId };
            console.log("Envoi de la requête de création de panier avec les données :", data);
            
            const response = await ApiService.post(`${API_CONFIG.BASE_URL}/paniers`, data, true);
            return response;
        } catch (error) {
            console.error("Erreur lors de la création du panier:", error);
            throw error;
        }
    }

    static async ajouterBillet(panierId, soireeId, quantite, prix) {
        try {
            const data = {
                soiree_id: soireeId,
                quantite: quantite,
                prix: prix
            };
            console.log("Envoi de la requête d'ajout de billet avec les données :", data);
            
            const response = await ApiService.post(`${API_CONFIG.BASE_URL}/paniers/${panierId}`, data, true);
            return response;
        } catch (error) {
            console.error("Erreur lors de l'ajout d'un billet au panier:", error);
            throw error;
        }
    }
}
