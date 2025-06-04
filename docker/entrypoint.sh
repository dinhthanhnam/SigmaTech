#!/bin/bash

if [ ! -d "vendor" ]; then
  echo "No vendor/ folder found. Running composer install..."
  composer install --no-progress --no-interaction --prefer-dist --no-dev || exit 1
fi

php artisan migrate:fresh --seed

php-fpm -D
nginx -g "daemon off;"