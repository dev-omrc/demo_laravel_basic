# demo_laravel_basic
## Demo utilizada durante FLISOL 2018 UGB

### Pasos de instalación
```
composer install
mv .env.example .env
php artisan key:generate
```
Configurar archivo .env (datos de base de datos)
```
php artisan migrate
php artisan storage:link
```
