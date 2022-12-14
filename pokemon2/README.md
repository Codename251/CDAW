Pour initialiser le projet :

-git clone 
-cd CDAW/pokemon2
-composer update
-cp .env.example .env
-sudo mysql -u root
    ->CREATE DATABASE pokemon2;
    ->exit
-php artisan migrate
-php artisan db:seed
-php artisan key:generate
-php artisan serve