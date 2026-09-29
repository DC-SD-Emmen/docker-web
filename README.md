# PHP-ontwikkelomgeving

Dit is een repo om makkelijk een nieuw project te starten met Docker. Het bevat PHP8.5, Nginx als webserver en MySQL.

## Voordat je begint

Installeer Docker Desktop wanneer je dit nog niet hebt gedaan. 

https://www.docker.com/products/docker-desktop/

## Eerste keer: instellingen configureren

De instellingen die nodig zijn voor Docker staan in een `.env` bestand. Op het moment dat je deze repository hebt gecloned bestaat dit bestand niet.

Open de map waar je naartoe hebt gecloned in je favoriete editor (bijvoorbeeld Visual Studio Code). Maak vervolgens een kopie van `.env.example` en wijzig de naam dan vervolgens naar `.env`. Je kunt eventueel de waarden in je nieuwe `.env` bestand aanpassen, maar dit is niet verplicht.

## Docker container starten

Navigeer naar de map waar je deze repository hebt gecloned in je Terminal/PowerShell/Commandprompt. Voer vervolgens een van onderstaande commando's uit.

```bash
docker compose up -d      # starten (de eerste keer duurt het even)
docker compose down       # stoppen
```

Open daarna **http://localhost:8080**.

Nadat je `compose up` hebt uitgevoerd verschijnt de container meestal in Docker Desktop. Vanaf nu kun je de container ook vanuit daar starten en stoppen.

## Jouw PHP-scripts

Zet je (PHP) bestanden in de map `src/`. Je kunt ze vervolgens openen via http://localhost:8080 (tenzij je het `.env` bestand hebt aangepast).

Op dit moment staat er demonstratie code in de `/src` map. Voel je vrij om de bestanden die in deze map staan te verwijderen.

Plaats je bijvoorbeeld een bestand `opdracht1.php` in de `/src` map, kun je deze vervolgens bekijken via http://localhost:8080/opdracht1.php

## Database (MySQL)

In deze container zit ook een database. Wil je verbinden met de database gebruik dan een van onderstaande code snippets.

```php
$pdo = new PDO(
    'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME') . ';charset=utf8mb4',
    getenv('DB_USER'),
    getenv('DB_PASSWORD')
);
$mysqli = new mysqli(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_NAME'));
$sqlite = new PDO('sqlite:/app/database.sqlite');
```

Je ziet dat de code de functie `getenv` meerdere keren aanroept. Met deze functie worden de gegevens uit de environment gehaald (de `.env` file.)

[!CAUTION]
Plaats nooit (database) wachtwoorden in je PHP script! Als je dit script namelijk op GitHub plaatst kan iedereen je (database) wachtwoorden in zien.

## Xdebug

Xdebug maakt bij elk verzoek verbinding met je IDE op poort **9003**.

- **VS Code**: installeer de extensie *PHP Debug* en voeg een *Listen for Xdebug*-configuratie toe met
  `"pathMappings": { "/src": "${workspaceFolder}/src" }`.
- **PhpStorm**: zet *Start Listening for PHP Debug Connections* aan en koppel bij de server-instellingen
  (localhost:8080) de map `src` aan `/src`.