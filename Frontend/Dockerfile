FROM node:18

WORKDIR /usr/src/app/Frontend

COPY Frontend/package*.json ./

RUN npm install

COPY Frontend .

EXPOSE 8080

CMD ["npm", "start"]