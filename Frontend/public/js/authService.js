import { API_CONFIG } from './api.js';

export class AuthService {
    constructor() {
        this.token = localStorage.getItem('jwt_token');
        this.baseUrl = API_CONFIG.BASE_URL;
    }

    async register(email, password, nom, prenom) {
        try {
            const response = await fetch(`${this.baseUrl}/auth/register`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email,
                    password,
                    nom,
                    prenom,
                    role: 'user'
                })
            });

            if (response.status === 204 || response.status === 201) {
                return { success: true };
            }

            if (response.headers.get('content-type')?.includes('application/json')) {
                const data = await response.json();
                if (!response.ok) {
                    throw new Error(data.error || 'Erreur lors de l\'inscription');
                }
                return data;
            }

            if (response.ok) {
                return { success: true };
            }

            throw new Error('Erreur lors de l\'inscription');
        } catch (error) {
            console.error('Erreur d\'inscription:', error);
            throw error;
        }
    }

    async login(email, password) {
        try {
            const response = await fetch(`${this.baseUrl}/auth/login`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email, password })
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.error || 'Email ou mot de passe incorrect');
            }

            if (data.accessToken) {
                this.setToken(data.accessToken);
                if (data.refreshToken) {
                    localStorage.setItem('refresh_token', data.refreshToken);
                }
                return data;
            } else {
                throw new Error('Format de réponse invalide');
            }
        } catch (error) {
            console.error('Erreur de connexion:', error);
            throw error;
        }
    }

    setToken(token) {
        this.token = token;
        localStorage.setItem('jwt_token', token);
    }

    logout() {
        this.token = null;
        localStorage.removeItem('jwt_token');
        localStorage.removeItem('refresh_token');
        return true;
    }

    isAuthenticated() {
        return !!localStorage.getItem('jwt_token');
    }
}

export const authService = new AuthService();
