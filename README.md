# sistemabase
 Sistema base de laravel para el comienzo de los proyectos
 
Instalacion
Clone the repo

git clone https://github.com/Facundo14/sistemabase.git

Move to the newly created folder and install all dependencies:

cd sistemabase

composer install

Create a new database, for example with phpMyAdmin. Then open the .env.example file, edit it to match your database name, username and password and save it as .env file. Once done, build tables with the following command:

php artisan migrate

Now fill the tables:

php artisan db:seed

Finally, generate the application key

php artisan key:generate

Open your favorite browser and visit the newly created app.
