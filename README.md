quick guide

git clone https://github.com/tln1728/eblog
cd eblog
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve