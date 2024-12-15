quick guide

git clone https://github.com/tln1728/eblog
<br>
cd eblog
<br>
composer install
<br>
cp .env.example .env
<br>
php artisan key:generate
<br>
php artisan migrate
<br>
php artisan db:seed
<br>
php artisan serve