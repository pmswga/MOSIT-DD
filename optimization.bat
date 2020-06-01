
composer install --optimize-autoloader --no-dev

php artisan config:clear
php artisan config:cache

php artisan route:clear
rem php artisan route:cache


php artisan view:clear
php artisan view:cache

