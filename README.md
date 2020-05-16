# Laravel Database Example

This repo is here for us to walk through a few of the database tools that come with Laravel. We'll take a quick look at migrations first. There are a few cool but subtle things that laravel will do to make your life easier

Let's create our first new table:

```
php artisan make:migration create_books_table
php artisan migrate
```

This will create a brand new migration file for us in the `database/migrations` folder. Notice that when we use the migration name `create*` the migration that is created for us sets up the schema with a create command. If we run the migrations at this point, a new table will be created in the database we've configured laravel to connect to. Check your settings in the .env file and run that second command!

The default columns that a table gets are the autoincrementing `id` column and the two timestamp columns `created_at` and `updated_at`. To give our books table a bit more purpose, let's add come columns to it:

```
php artisan make:migration add_additional_columns_to_books_table
```

Notice how the static method on the `Schema` class has changed from `::create` to `::table`. Also note how the closures inside both the `up` and `down` methods are empty. This `//` is a little hint that you'll find all over laravel. It means "put your code here to do something".

The idea behind the `up` and `down` methods are helping you keep your database structure consitant. Did you see how the `down` method in the create migration destroyed the table, while the `up` method created it? We should do the same when we write our own migrations.

Let's run that and see the new columns appear in the `books` table.

# Factories

Factories are exactly what they sound like-small bits of code that pump out objects. They are like assembly lines and you can configure them many different ways, but they all start with a model. Let's create that model now and then create a factory that is associated with it:

```
php artisan make:model Book
php artisan make:factory BookFactory --model Book
```

Now that we have a model that works with the migration we've created we should be able to create some DB records pretty easy. Inside a `tinker` session try running `\App\Book::create()`. You should get an error, because we haven't given any data to laravel to create this new `Book` so it is trying to use the defaults from the database migration. The `title` field doesn't have a default value, so you get a database exception. Here is where a factory can come in handy.
