[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-24ddc0f5d75046c5622901739e7c5dd533143b0c8e959d652212380cedb1ea36.svg)](https://classroom.github.com/a/ebT1wQO_)

**Instruction to install the App!**

Starta igång projektet!

Klona projektet från GitHub:
Börja med att kopiera länken till repo:t. Nu ska du in i terminalen och befinna dig i rätt mapp där du vill spara projektet, och skriva följande:
“git clone https://github.com/chas-academy/u05-imdb-klon-grupp-6.git”

När detta är gjort och projektet har öppnats i VScode kör du installationen för Composer (hanterare för PHP - installerar bibliotek och paket som behövs för ett PHP-projekt).

Kör kommandot “composer install” i rotmappen i ditt projekt för att installera alla nödvändiga tillägg.

Om Node finns installerat i din Docker, kör du detta kommandot i terminalen:
```npm install```. Nästa steg blir kommandot: ```php artisan serve```.
Om Node inte är installerat i din Docker, 
så ska dessa uppgifter in i din Dockerfil för att installera npm och node.js:

```
RUN apt-get install -y nodejs
RUN apt-get install -y npm
```

Nu ska du rebuild:a din container.
Därfter kör du dessa kommandon i terminalen:

```
sudo npm install –g n
sudo npm run build
``` 

Om ovanstående installation ger error, följ dessa steg:
- Kör ```sudo n latest```.

Om denna inte heller fungerar, testa hjälpkommandon nedan:
- nvm install node
- node -v
- npm i 
- npm init
- npm run dev

Konfigurera:<br>
I ditt projekt har du en .env example fil som du kan använda som en mall för att skapa en lokal .env fil. I denna fil ska alla dina autentiseringsuppgifter för databasen skrivas in.
Dessa uppgifter får du genom att gå till localhost:8080 och logga in med root/mariadb och därefter skapa en egen databas. Databas, användarnamn, lösenord för du in i din .env fil.
Det behövs även en “app key” som kan genereras med kommandot ```php artisan key:generate```. Denna nyckel används som en “hemlig sträng” eller “token” för att säkra olika aspekter av applikationen.


Migrationer:<br>
Du behöver även göra en migration till databasen för att applikationen ska kunna ta emot och spara data. En migration görs med följande kommando: ```php artisan migrate```. Detta kommando gör att vi kan skapa och uppdatera tabeller och relationer i koden. En migration hjälper även till med versionshantering, eftersom att varje migration representerar en enskild förändring. Kortfattat är kommandot ett bra verktyg för att kunna synkronisera din applikations databasstruktur i en kontrollerad process.

Köra applikationen:<br>
Nu har du alla verktyg för att kunna öppna upp ditt projekt på en lokal server.
Använd kommandot ```php artisan serve``` för att öppna porten och komma åt servern, som får länken http://127.0.0.1.8000. Det går även att nå den genom att skriva localhost:8000 i adressfältet.



