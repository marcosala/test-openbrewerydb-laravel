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

### Utenza

| username  | password |
| ------------- |:-------------:|
| root      | password   |

