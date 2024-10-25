import { templates } from './templateLoader.js';
import { SpectacleFilter } from './spectacleFilter.js';
import { PageManager } from './pageManager.js';
import { AuthController } from './authController.js';
import { SpectacleController } from './spectacleController.js';
import { EventManager } from './eventManager.js';
import { afficherPanier } from './panierController.js';

class SPA {
    constructor() {
        this.contentDiv = document.getElementById('content');
        this.pageManager = new PageManager(this.contentDiv, templates);
        this.spectacleFilter = new SpectacleFilter();

        this.authController = new AuthController(this.pageManager);
        this.spectacleController = new SpectacleController(this.pageManager, this.spectacleFilter);
        this.eventManager = new EventManager(
            this.contentDiv,
            this.pageManager,
            this.authController,
            this.spectacleController,
            this.spectacleFilter
        );

        this.initializeApp();
    }

    initializeApp() {
        this.authController.updateAuthButtons();

        
        const panierLink = document.getElementById('panierLink');
        if (panierLink) {
            panierLink.addEventListener('click', () => {
                afficherPanier();
            });
        }

        if (this.authController.checkAuthentication()) {
            const currentPage = window.location.hash.slice(1) || 'home';
            this.pageManager.navigateToPage(currentPage);
        }
        
        this.eventManager.initializeEventListeners();
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new SPA();
});
