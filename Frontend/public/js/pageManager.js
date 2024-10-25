export class PageManager {
    constructor(contentDiv, templates) {
        this.contentDiv = contentDiv;
        this.templates = templates;
        this.pageData = {
            home: {
                title: "Nancy Rock Vibrations",
                description: "Bienvenue découvrez ici tout les Spectacles de Nancy Rock Vibrations",
            },
            spectacle: null,
            soiree: null,
            connexion: {
                title: "Connexion",
                description: "Connectez-vous à votre compte"
            },
            inscription: {
                title: "Inscription",
                description: "Créez votre compte pour accéder aux spectacles"
            },
            compte: {
                title: "Mon compte",
                description: "Gérez vos informations personnelles"
            }
        };
    }

    setPageData(pageName, data) {
        this.pageData[pageName] = {
            ...this.pageData[pageName],
            ...data
        };
    }

    navigateToPage(pageName) {
        if (this.templates[pageName]) {
            const pageData = {
                ...this.pageData[pageName],
                isAuthenticated: this.isAuthenticated()
            };
            
            if (pageData) {
                const html = this.templates[pageName](pageData);
                this.contentDiv.innerHTML = html;
            }
        }
    }

    isAuthenticated() {
        return !!localStorage.getItem('jwt_token');
    }
}