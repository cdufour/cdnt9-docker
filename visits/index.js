const express = require('express');
const redis = require('redis');
const app = express();

// DENIED Redis is running in protected mode
const redisCli = redis.createClient({
    host: 'redis-server',
    port: 6379
});

app.get('/', (req, res) => {
    redisCli.get('visits', (err, visits) => {
        if (!visits) visits = 0;
        res.send('Nombre de visites: ' + visits);
        redisCli.set('visits', parseInt(visits) + 1)
    });
})

app.listen(3000, () => {
    console.log('Serveur express écoutant le port 3000');
})