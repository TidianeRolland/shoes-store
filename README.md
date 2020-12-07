# shoes-store
A simple store for Shoes

# Launching the app using only One Command
- After cloning the project, go inside the project folder (using the `cd` command for example)
- In the root directory, you will find a file named .env.example, rename the given file name to .env and edit your database credentials here.
- Make sure your database server (MySQL, Oracle,...) is running and the database you configured into .env file is created.
- Run `npm run start` This will load, build everything and start the server using an address with port number 8000. 


# Launching the app manually
- After cloning the project, go inside the project folder (using the `cd` command for example)
- Run `composer install`, `npm install`, `npm run dev`
- In the root directory, you will find a file named .env.example, rename the given file name to .env and run the following command to generate the key (and you can also edit your database credentials here) `php artisan key:generate`
- Make sure your database server (MySQL, Oracle,...) is running and the database you configured into .env file is created.
- Run migrations and seeders: `php artisan migrate:fresh --seed`
- Launch the server `php artisan serve` (This will give you an address with port number 8000.)
