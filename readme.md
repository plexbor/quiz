## Как развернуть проект

- composer install
- cp .env.example .env
- php artisan key:generate
- установить параметры подключения к БД в .env
- php artisan migrate
- php artisan db:seed
- php artisan limit:update
- php artisan passport:install
- npm install
- npm run dev


### Для разработки

- php artisan serve
- npm run watch
- vendor/bin/phpunit


### При первом деплое на production сервер
- php artisan passport:keys
