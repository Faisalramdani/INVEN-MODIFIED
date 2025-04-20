#!/bin/bash

# Tunggu database siap
echo "Waiting for database..."
sleep 5

# Jalankan migrate
php artisan migrate:fresh --seed --force

# Jalankan Seeder
php artisan db:seed --force

# Jalankan server
php artisan serve --host=0.0.0.0 --port=${PORT}
