import { authService } from './authService.js'; 
import { ApiService } from './api.js'; 
import { templates } from './templateLoader.js'; 

export async function afficherPanier(userId) {
    if (!authService.isAuthenticated()) {
        alert("Vous devez être connecté pour voir le panier.");
        window.location.href = '#connexion'; 
        return;
    }

    try {
        const panierData = await PanierService.recupererPanier(userId);
        const html = templates.panier(panierData);
        document.getElementById('content').innerHTML = html;
    } catch (error) {
        console.error("Erreur lors de la récupération du panier", error);
    }
}
