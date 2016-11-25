#!/bin/sh

echo "Executando php artisan config:clear"
php artisan config:clear

echo "Executando php artisan config:cache"
php artisan config:cache

echo "Executando php artisan cache:clear"
php artisan cache:clear

echo "Executando php artisan clear-compiled"
php artisan clear-compiled

echo "Executando php artisan route:clear"
php artisan route:clear

echo "Executando php artisan view:clear"
php artisan view:clear

echo "Executando composer dump-autoload"
composer dump-autoload

