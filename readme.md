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


### Дополнительная информация

- php artisan limit:update - обновляет лимиты для денег и предметов, лимиты можно изменить в .env
- php artisan withdraw:send - отправляет денежные призы на счета пользователей

- php artisan passport:keys - Выполнить при первом деплое на production сервер

Коэффициент конвертации денежного приза в баллы лояльности можно изменить в .env
