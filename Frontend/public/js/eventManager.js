export class EventManager {
    constructor(contentDiv, pageManager, authController, spectacleController, spectacleFilter) {
        this.contentDiv = contentDiv;
        this.pageManager = pageManager;
        this.authController = authController;
        this.spectacleController = spectacleController;
        this.spectacleFilter = spectacleFilter;
    }

    initializeEventListeners() {
        this.initializeNavigationListeners();
        this.initializeAuthListeners();
        this.initializeSpectacleListeners();
        this.initializeHistoryListener();
    }

    initializeNavigationListeners() {
        document.querySelectorAll('button[data-page]').forEach(button => {
            button.addEventListener('click', async (e) => {
                const pageName = e.target.dataset.page;
                if (pageName === 'spectacle') {
                    await this.spectacleController.fetchSpectacleData();
                } else {
                    this.pageManager.navigateToPage(pageName);
                }
            });
        });
    }

    initializeAuthListeners() {
        this.contentDiv.addEventListener('submit', (e) => {
            if (e.target.matches('#loginForm')) {
                this.authController.handleLogin(e);
            }
            if (e.target.matches('#registerForm')) {
                this.authController.handleRegister(e);
            }
        });

        this.contentDiv.addEventListener('click', (e) => {
            if (e.target.matches('#registerLink')) {
                e.preventDefault();
                this.pageManager.navigateToPage('inscription');
            }
            if (e.target.matches('#loginLink')) {
                e.preventDefault();
                this.pageManager.navigateToPage('connexion');
            }
            if (e.target.matches('#logoutButton')) {
                e.preventDefault();
                this.authController.handleLogout();
            }
        });
    }

    initializeSpectacleListeners() {
        this.contentDiv.addEventListener('click', async (e) => {
            if (e.target.matches('.filter-type-button')) {
                this.spectacleFilter.updateFilter('filterType', e.target.dataset.filterType);
                this.spectacleController.updateSpectacleDisplay();
            }
            
            if (e.target.matches('.date-button')) {
                this.spectacleFilter.updateFilter('date', e.target.dataset.date);
                this.spectacleController.updateSpectacleDisplay();
            }

            if (e.target.matches('.lieu-button')) {
                this.spectacleFilter.updateFilter('lieu', e.target.dataset.lieu);
                this.spectacleController.updateSpectacleDisplay();
            }

            if (e.target.matches('.style-button')) {
                this.spectacleFilter.updateFilter('style', e.target.dataset.style);
                this.spectacleController.updateSpectacleDisplay();
            }
            
            const spectacleCard = e.target.closest('.spectacle-card');
            if (spectacleCard) {
                const soireeUrl = spectacleCard.dataset.soireeId;
                if (soireeUrl) {
                    await this.spectacleController.fetchSoireeData(soireeUrl);
                }
            }
        });
    }

    initializeHistoryListener() {
        window.addEventListener('popstate', () => {
            this.authController.checkAuthentication();
        });
    }
}