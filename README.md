# FeedFlow

Un'applicazione web per la gestione e visualizzazione di dati social, costruita con **Laravel 13** e **Vite**.
## Requisiti
Sistema:
- **PHP** >= 8.3  
- **Composer**  
- **Node.js**  
- **npm**  
## Installazione e avvio da VSCode

### 1. Clona la repository
### 2. Installa le dipendenze PHP

```bash
composer install
```
### 3. Configura il file `.env`
```bash
cp .env.example .env
php artisan key:generate
```
### 4. Crea il database e lancia le migrazioni
```bash
touch database/database.sqlite
php artisan migrate
```
### 5. Installa le dipendenze 
```bash
npm install
```
### 6. Avvia il server di sviluppo
In due terminali separati:

**Terminale 1 — Backend Laravel:**
```bash
php artisan serve
```

**Terminale 2 — Frontend Vite:**
```bash
npm run dev
```

---

### 7. Apri il browser
http://localhost:8000  

## Struttura del progetto

```
├── app/            # Logica dell'applicazione (Controllers, Models, ecc.)
├── bootstrap/      # File di bootstrap di Laravel
├── config/         # File di configurazione
├── database/       # Migration, factory e seeder
├── lang/           # File di traduzione
├── public/         # Entry point pubblico (index.php, asset)
├── resources/      # Viste Blade, CSS, JavaScript 
├── routes/         # Definizione delle rotte 
├── storage/        # Log, cache, file caricati
├── tests/          # Test automatici
├── .env.example    # Template delle variabili d'ambiente
├── artisan         # CLI di Laravel
├── composer.json   # Dipendenze PHP
├── package.json    # Dipendenze Node.js
└── vite.config.js  # Configurazione Vite
```

---
