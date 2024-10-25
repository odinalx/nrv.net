FROM node:18
WORKDIR /usr/src/app/Frontend
COPY Frontend/package*.json ./
RUN npm install
COPY Frontend .
EXPOSE 48010
ENV PORT=48010
CMD ["npm", "start"]