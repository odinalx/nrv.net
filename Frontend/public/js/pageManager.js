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
            }
        };
    }

    setPageData(pageName, data) {
        this.pageData[pageName] = data;
    }

    navigateToPage(pageName) {
        if (this.templates[pageName]) {
            const pageData = this.pageData[pageName];
            if (pageData) {
                const html = this.templates[pageName](pageData);
                this.contentDiv.innerHTML = html;
            }
        }
    }
}
