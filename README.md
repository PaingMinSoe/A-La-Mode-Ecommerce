<p align="center"><a href="https://laravel.com" target="_blank"><img src="public/img/alamode_general.png" width="200"></a></p>

## A La Mode

An E-commerce website platform built using Laravel Framework. Feature for Admin such as CRUD functions for products, and chart display are included. Customers have features such as shopping cart, wishlist and checkout with stripe payment gateway implemented.

## Setting up

Firstly create a database named 'proj' in MySQL server. Or .env file in the project can be edited to the database name required for the project.

Then install the necessary packages using the following commands.
```console
composer install
npm install
php artisan key:generate
```

Run the following command in terminal to create tables in the designated database.

```console
php artisan migrate:fresh --seed
```

Use following command to run the project in browser.

```console
php artisan serve
```

To use with pre-existing data, you can execute the sql file in MySQL Workbench or phpmyadmin instead of running migrate command.
https://github.com/PaingMinSoe/A-La-Mode-Ecommerce/blob/main/public/proj.sql

For Admin account, username is steve.rogers@gmail.com and password is just password.
For Customer account, username is superman@gmail.com and password is just password.

## Screenshots

![Login Panel](https://user-images.githubusercontent.com/61079619/236727572-db904c88-b030-4017-b447-da482766740a.png)

![Admin Dashboard](https://user-images.githubusercontent.com/61079619/236727938-cb19b201-d785-417f-8c9c-c16d43014eaf.png)

![Order Manage](https://user-images.githubusercontent.com/61079619/236728020-27748cf0-6020-4ca1-9595-010ebbd37af9.png)

![Landing Page](https://user-images.githubusercontent.com/61079619/236727227-6e5e63d6-5223-4348-8250-2cc1107eca71.png)

![Products](https://user-images.githubusercontent.com/61079619/236728169-d8ec358b-027c-4623-a0f8-ff28eddc81a4.png)

![Product Detail](https://user-images.githubusercontent.com/61079619/236728329-94f5dcbf-64e7-44e2-8977-9feabe89a78d.png)

![Shopping Cart](https://user-images.githubusercontent.com/61079619/236728243-a7db87a5-0bfc-4704-a155-b7b521c9a747.png)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
