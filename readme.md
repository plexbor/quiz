## Как развернуть проект

- composer install
- cp .env.example .env
- php artisan key:generate
- установить параметры подключения к БД в .env
- php artisan migrate
- php artisan db:seed
- php artisan passport:install


### Для разработки

- npm install
- npm run watch

- php artisan serve


### При первом деплое на production сервер
- php artisan passport:keys
