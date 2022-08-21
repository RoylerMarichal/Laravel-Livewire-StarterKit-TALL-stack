# Laravel Livewire StarterKit
![Laravel Livewire StarterKit](https://raw.githubusercontent.com/cluzstudio/Laravel-Livewire-StarterKit/main/public/assets/img/preview.jpg)

This script could work perfectly for a project in production without making additional changes, but the goal is to provide a quick way to start or move forward with the TALL stack (Tailwind, Alpine, Laravel, and Livewire)

- Require PHP 8
 
## Features
These are the features that are included:

- Manage services
- You can create services of any type which can be hired by your clients
- Manage users
- You can manage all the users of your application, edit their profiles and access their accounts by simply touching the "Access as" button.
- Manage invoices
- Manage orders, the orders of the services 
- Admin Dashboard
- User Dashboard
- Stats system
This module has a system to detect bot and ensure that each visit is unique within 24 hours to optimize the size of the table in the database.
- Internal notification system
- Edit profile page
- Tickets system
- Dark and Light theme
- All in real time with Livewire and Alpine Js
- Implement Google ReCaptcha in Login

## Instructions
- Clone the repo
- Install packages: composer install 
- Modify the .env file with the data of your database and mail
- Generate the key, Run in the console: php artisan key:generate
- Run migrations & seeders, Run in the console: php artisan migrate --seed 
- Run in the console: php artisan optimize
- Run in the console: npm install
- Run in the console: npm run prod 
- Enjoy!

## Admin Login
- User: admin@admin.com
- Password: 123456789 