const express = require('express');
const app = express();

app.get('/', (req, res) => {
    res.send('Ciao, je suis un serveur express');
})

app.post('/login', (req, res) => {
    res.send('POST /login');
})

app.listen(8080, () => {
    console.log('Server écoutant le port 8080');
})