const express = require('express');
const path = require('path');
const app = express();
const port = 8080;

// Servir les fichiers statiques
app.use(express.static(path.join(__dirname, 'public')));

// Support des templates Handlebars
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

// Route pour servir les templates Handlebars
app.get('/templates/:template', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'templates', `${req.params.template}.hbs`));
});

// Servir les fichiers JS compilés
app.use('/dist', express.static(path.join(__dirname, 'public', 'dist')));

// Servir les fichiers CSS
app.use('/css', express.static(path.join(__dirname, 'public', 'css')));

app.listen(port, '0.0.0.0', () => {
    console.log(`Server is running on port ${port}`);
});