Installation

Install Composer using detailed installation instructions here
Install Node.js using detailed installation instructions here

Clone repository

    $ git clone https://github.com/leoshak/limbcare.git

Change into the working directory

    $ cd laravel-boilerplate

Copy .env.example to .env and modify according to your environment

    $ cp .env.example .env

Install composer dependencies

    $ composer install --prefer-dist

An application key can be generated with the command

    $ php artisan key:generate

Execute following commands to install other dependencies

    $ npm install
    $ npm run dev

Run these commands to create the tables within the defined database and populate seed data

Before run below command TRY:

    php artisan config:cache

or
    php artisan config:clear

then:

    $ php artisan migrate --seed

If you get an error like a PDOException try editing your .env file and change DB_HOST=127.0.0.1 to DB_HOST=localhost or DB_HOST=mysql (for docker-compose environment).
Run

To start the PHP built-in server

   $ php artisan serve --port=8080

or
   $ php -S localhost:8080 -t public/

Now you can browse the site at http://localhost:8080

*If forked repository:*

**If you have cloned this repository from a your fork, follow below steps first:**

- Go to cloned repository in your local machine.
- If you haven't set the upstream(master repo in your local) follow this link: https://help.github.com/articles/fork-a-repo/
- then to get master repositoty commits to your machine type [git fetch upstream] and then [git merge upstream/master]
-- if you have any problem, follow this link to set upstream: https://help.github.com/articles/syncing-a-fork/
