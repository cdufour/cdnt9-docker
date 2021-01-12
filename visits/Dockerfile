# Image de base
FROM node:14.15.4-alpine3.10

WORKDIR '/app'

COPY ./package.json ./
COPY ./index.js ./

RUN npm install

CMD ["npm", "start"]