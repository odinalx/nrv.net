export const API_CONFIG = {
    BASE_URL: 'http://docketu.iutnc.univ-lorraine.fr:48013'
};

export class ApiService {
    static async get(endpoint, requiresAuth = false) {
        let headers = {};
        
        if (requiresAuth) {
            const token = localStorage.getItem('jwt_token');
            if (!token) {
                throw new Error('Authentication required');
            }
            headers['Authorization'] = `Bearer ${token}`;
        }

        const response = await fetch(`${API_CONFIG.BASE_URL}${endpoint}`, {
            method: 'GET',
            headers
        });

        if (response.status === 401) {
            localStorage.removeItem('jwt_token');
            localStorage.removeItem('refresh_token');
            window.location.href = '/connexion';
            throw new Error('Session expirée');
        }

        if (!response.ok) {
            throw new Error('API request failed');
        }

        return response.json();
    }

    static async post(endpoint, data, requiresAuth = false) {
        let headers = {
            'Content-Type': 'application/json'
        };
        
        if (requiresAuth) {
            const token = localStorage.getItem('jwt_token');
            if (!token) {
                throw new Error('Authentication required');
            }
            headers['Authorization'] = `Bearer ${token}`;
        }

        const response = await fetch(`${API_CONFIG.BASE_URL}${endpoint}`, {
            method: 'POST',
            headers,
            body: JSON.stringify(data)
        });

        if (response.status === 401) {
            localStorage.removeItem('jwt_token');
            localStorage.removeItem('refresh_token');
            window.location.href = '/connexion';
            throw new Error('Session expirée');
        }

        return response.json();
    }
}
