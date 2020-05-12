# Laravel Database Example

This repo is here for us to walk through a few of the database tools that come with Laravel. We'll take a quick look at migrations first. There are a few cool but subtle things that laravel will do to make your life easier

Let's create our first new table:

```
php artisan make:migration create_books_table
php artisan migrate
```

This will create a brand new migration file for us in the `database/migrations` folder. Notice that when we use the migration name `create*` the migration that is created for us sets up the schema with a create command. If we run the migrations at this point, a new table will be created in the database we've configured laravel to connect to. Check your settings in the .env file and run that second command!
