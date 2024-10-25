import { API_CONFIG } from './api.js';

export class SpectacleService {
    static async fetchSpectacles() {
        try {
            const response = await fetch(`${API_CONFIG.BASE_URL}/spectacles`);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return await response.json();
        } catch (error) {
            console.error('Erreur lors de la récupération des spectacles:', error);
            return { spectacles: [] };
        }
    }

    static async fetchSoiree(soireeUrl) {
        try {
            const cleanUrl = soireeUrl.startsWith('/') ? soireeUrl.slice(1) : soireeUrl;
            const response = await fetch(`${API_CONFIG.BASE_URL}/${cleanUrl}`);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return await response.json();
        } catch (error) {
            console.error('Erreur lors de la récupération de la soirée:', error);
            throw error;
        }
    }
}
