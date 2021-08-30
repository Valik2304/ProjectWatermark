
## Installation

1. `composer install`
1. Rename or copy `.env.example` file to `.env`
1. `php artisan key:generate`
1. Set your database credentials in your `.env` file
1. Set your `APP_URL` in your `.env` file. This is needed for Voyager to correctly resolve asset URLs.
1. Set your Google and Facebook credentials in your `.env` file. This is needed for social auth.
1. Set your `MAIL_CONTACT_EMAIL` credentials in your `.env` file. This is needed for callback form in main page.
1. `php artisan topcity:install`. This will migrate the database and run any seeders necessary.
1. `npm install`
1. `npm run dev`
1. `php artisan serve` or use Laravel Valet or Laravel Homestead or Nginx+PhpFpm or Apache
1. Visit `localhost:8000` or `APP_URL` in your browser
1. Visit `/admin` if you want to access the Voyager admin backend. Admin User/Password: `admin@admin.com/password`. Admin Web User/Password: `adminweb@adminweb.com/password`

