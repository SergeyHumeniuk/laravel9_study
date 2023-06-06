#!/usr/bin/env bash

# Composer
#./vendor/bin/sail --no-dev --no-progress
#npm install
#./node_modules/gulp/bin/gulp.js

# Cache clear
./vendor/bin/sail artisan view:clear
./vendor/bin/sail artisan cache:clear

# Building application cache
./vendor/bin/sail artisan config:cache
./vendor/bin/sail artisan route:cache

# Migrations (DB updates and seeding)
./vendor/bin/sail artisan migrate --force
./vendor/bin/sail artisan db:seed --force

# Maintenance mode off
./vendor/bin/sail artisan up
