<strong>Prerequisites</strong>

<ol>
    <li>Instlled composer
    <li>Instlled php, php-mbstring, php-xml
</ol>

<p>To run the project:</p>
<ol>
    <li>Clone the project from git
    <li>Enter the project directory on local machine
    <li>Change .env-example to .env and enter DB_DATABASE=your_datebase_name, DB_USERNAME=mysql_user,DB_PASSWORD=mysql_user_password
    <li>Go to app.php and set you timezone
    <li>Create a MYSQL database with a name from .env file
    <li>Install composer dependancies <i>composer install</i>
    <li>Install node dependancies <i>npm install</i>
    <li>Generate key <i>php artisan key:generate</i>
    <li>Run database migrations <i>php artisan migrate</i>
    <li>Run seeder, auto fill database <i>php artisan db:seed</i>
    <li>Run application <i>php artisan serve</i>
</ol>
