## Как развернуть проект

- composer install
- cp .env.example .env
- php artisan key:generate
- установить параметры подключения к БД в .env
- php artisan migrate
- php artisan db:seed
