## Laravel pizza project

# This project is only for learning purposes
# Installation, Dependencies
The project uses Laravel, TailwindCss, AlpineJS
- PHP ^8.1.12
- Laravel ^10.7.1
- Run > npm install to load dependencies
- Create database table name "pizza" with root user and no password to implement migrations
- Run > php artisan migrate --seed to seed with dummy users and related dummy posts
- Run > php artisan serve to start local server : requires local server like apache/xampp
- Run > npm run dev to start vite server

- seeder creates admin user: 
    *email: admin@admin.com / password: password
- seeder creates 5 dummy categories and 100products with random categories
- registration function is available, but guests can also place an order
- simple auth functionality
- 1step cart functionality and checkout

# Admin:
- can be accessed: *domain*/admin/
- user crud functionality
- product crud functionality
- order lister