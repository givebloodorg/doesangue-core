#!/bin/sh

echo "Running php artisan config:clear"
php artisan config:clear

echo "Running php artisan config:cache"
php artisan config:cache

echo "Running php artisan cache:clear"
php artisan cache:clear

echo "Running php artisan clear-compiled"
php artisan clear-compiled

echo "Running php artisan route:clear"
php artisan route:clear

echo "Running php artisan view:clear"
php artisan view:clear

echo "Running composer dump-autoload"
composer dump-autoload

