#!/bin/bash
echo "Backend service starting..."

# start php and run migrations/seeders
php-fpm -D && php artisan migrate && php artisan db:seed

# start server
nginx -g 'daemon off;'
