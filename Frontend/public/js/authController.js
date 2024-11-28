import { authService } from './authService.js';
import { PanierService } from './panierService.js';

export class AuthController {
    constructor(pageManager) {
        this.pageManager = pageManager;
    }

    updateAuthButtons() {
        const loginButton = document.getElementById('login-button');
        const compteButton = document.getElementById('compte-button');
        
        if (authService.isAuthenticated()) {
            if (loginButton) loginButton.style.display = 'none';
            if (compteButton) compteButton.style.display = 'block';
        } else {
            if (loginButton) loginButton.style.display = 'block';
            if (compteButton) compteButton.style.display = 'none';
        }
    }

    async handleLogin(event) {
        event.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const errorDiv = document.getElementById('loginError');
    
        try {
            const loginResult = await authService.login(email, password);
            if (loginResult && loginResult.accessToken) {
                if (errorDiv) errorDiv.style.display = 'none';
                this.updateAuthButtons();
                this.pageManager.navigateToPage('home');
            } else {
                throw new Error('Connexion échouée');
            }
        } catch (error) {
            console.error('Erreur de connexion:', error);
            if (errorDiv) {
                errorDiv.textContent = error.message || 'Email ou mot de passe incorrect';
                errorDiv.style.display = 'block';
            }
        }
    }

    async  handleRegister(event) {
        event.preventDefault();
        const email = document.getElementById('register-email').value;
        const password = document.getElementById('register-password').value;
        const confirmPassword = document.getElementById('register-confirm-password').value;
        const nom = document.getElementById('register-nom').value;
        const prenom = document.getElementById('register-prenom').value;
        const errorDiv = document.getElementById('registerError');
    
        if (password !== confirmPassword) {
            if (errorDiv) {
                errorDiv.textContent = "Les mots de passe ne correspondent pas.";
                errorDiv.style.display = 'block';
            }
            return;
        }
    
        try {
            const result = await authService.register(email, password, nom, prenom);
            if (result) {
                if (errorDiv) errorDiv.style.display = 'none';
    
                try {
                    const loginResult = await authService.login(email, password);
                    if (loginResult && loginResult.accessToken) {
                        this.updateAuthButtons();
    
                        const panierResponse = await PanierService.creerPanier(loginResult.user_id);
                        if (panierResponse && panierResponse.id) {
                            localStorage.setItem('panier_id', panierResponse.id);
                        }
    
                        this.pageManager.navigateToPage('home');
                        return;
                    }
                } catch (loginError) {
                    console.error('Auto-login failed:', loginError);
                }
    
                this.pageManager.navigateToPage('connexion');
            }
        } catch (error) {
            console.error("Erreur d'inscription:", error);
            if (errorDiv) {
                errorDiv.textContent = error.message || "Erreur lors de l'inscription. Veuillez réessayer.";
                errorDiv.style.display = 'block';
            }
        }
    }
    
    

    handleLogout() {
        authService.logout();
        this.updateAuthButtons();
        this.pageManager.navigateToPage('home');
    }

    checkAuthentication() {
        const protectedRoutes = ['spectacle', 'soiree', 'compte'];
        const currentPage = window.location.hash.slice(1) || 'home';
        if (protectedRoutes.includes(currentPage) && !authService.isAuthenticated()) {
            this.pageManager.navigateToPage('connexion');
            return false;
        }
        return true;
    }
}