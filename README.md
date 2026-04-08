# FeedFlow — Social Media Dashboard
FeedFlow è un'applicazione web sviluppata con Laravel che consente di gestire, analizzare e visualizzare dati provenienti da piattaforme social all'interno di una dashboard centralizzata.
## Features
* Dashboard per la visualizzazione dei dati
* Analisi delle performance  
* Architettura MVC basata su Laravel
## Tech Stack

* Backend: Laravel 13 (PHP >= 8.3)
* Frontend: Blade + Vite
* Database: MySQL
* Tooling: Composer, npm
## Setup e Installazione
### Clona la repository
```bash
git clone https://github.com/nicola98loiodice/social_dashboard.git
cd social_dashboard
```
### Installa le dipendenze backend
```bash
composer install
```
### Configura l'ambiente
```bash
cp .env.example .env
php artisan key:generate
```
### Configurazione database (MySQL)
Crea un database MySQL (ad esempio `feedflow`) e aggiorna il file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=feedflow
DB_USERNAME=root
DB_PASSWORD=
```
### Esegui le migrazioni

```bash
php artisan migrate
```
### Installa le dipendenze frontend

```bash
npm install
```
### Avvio applicazione
Apri due terminali:
Backend Laravel:

```bash
php artisan serve
```
Frontend Vite:

```bash
npm run dev
```

---
## Accesso
```
http://localhost:8000
```
## Struttura del progetto

```
├── app/            Logica applicativa (Controllers, Models, ecc.)
├── bootstrap/      Bootstrap di Laravel
├── config/         Configurazioni
├── database/       Migrazioni, factory, seeders
├── public/         Entry point pubblico
├── resources/      Blade, CSS, JavaScript
├── routes/         Definizione rotte
├── storage/        Log e file
├── tests/          Test automatici
```
## Possibili miglioramenti futuri
* Integrazione con API social reali
* Visualizzazioni avanzate (grafici e analytics)
* Sistema di notifiche
* Esportazione dati (CSV, PDF)
* Gestione ruoli e permessi utenti
