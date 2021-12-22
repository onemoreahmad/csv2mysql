## Installation

Run these commands in your command line

-   Run `git clone https://github.com/onemoreahmad/csv2mysql.git csv`
-   Run `composer install --ignore-platform-reqs`
-   Copy .env file `cp .env.example .env`
-   Run `php artisan key:generate`
-   Run `php artisan migrate --seed`
-   To fresh every thing later, run `php artisan migrate:fresh --seed`
