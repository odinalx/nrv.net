const express = require('express');
const path = require('path');
const app = express();
const port = process.env.PORT || 48010;

app.use(express.static(path.join(__dirname, 'public')));

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

app.get('/templates/:template', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'templates', `${req.params.template}.hbs`));
});

app.use('/dist', express.static(path.join(__dirname, 'public', 'dist')));

app.use('/css', express.static(path.join(__dirname, 'public', 'css')));

app.listen(port, '0.0.0.0', () => {
    console.log(`Server is running on port ${port}`);
});