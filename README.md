### istruzioni per il deploy del progetto

```
docker-compose up -d
docker exec -it test-openbrewerydb-laravel bash
composer install
php artisan key:generate
php artisan migrate
php artisan app:create-root-user 
npm install
npm run build
```
### Esecuzione dei test automatici

```
php artisan test
```

### Utenza

| username  | password |
| ------------- |:-------------:|
| root      | password   |

Accedi all'applicazione visitando [http://localhost:8000](http://localhost:8000/) nel tuo browser.

