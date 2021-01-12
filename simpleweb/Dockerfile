# Image de base
FROM node:14.15.4-alpine3.10

# Dossier de traval qui servira
# de point d'ancrage aux commandes suivantes
WORKDIR /usr/app

# Copie de l'ensemble du dossier courant dans l'image
COPY ./ ./

# Téléchargement et installation des dépendances via npm
RUN npm install

# Commande de démarrage (startup command)
#CMD ["node", "server.js"]
CMD ["npm", "start"]