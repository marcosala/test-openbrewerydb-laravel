## istruzioni per il deploy del progetto
```
docker compose up -d
docker exec -it laravel_app bash
composer install
php artisan key:generate
php artisan migrate
```
