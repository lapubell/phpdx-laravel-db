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

Optionally, we can loosen some of the safe guards that Laravel has out of the box. This will allow us to pass certain items into the `create` method on the Book model to make our lives easier. This can lead to simple mistakes or security concerns, but I do this all the time. :)

Factory states are pretty cool too. If we have a model that we can think of in multiple "states" then we can easily reference those in a human friendly way. Let's add some extra columns to the book model so that we can treat them like library books. Then we can create two states for books that are checked in and books that are checked out. Let's also create the `Library` model while we are at it:

```
php artisan make:model Library --migration
php artisan make:migration add_library_columns_to_books_table
```

Now let's just set a couple of methods to make the model relations work.

Next, let's create two factory states for the `Book` model. If a book has a `library_id` then that means it belongs to a library, so let's create a `libraryBook` state. Also, a book without a timestamp in the `checked_out_at` column means it's `available`, and if there is a timestamp then the book is in a checked out state.

This all looks pretty great, so let's build a quick view or 2 to see all the libraries and their books. Run this command and then add in a few new route bindings and controller actions/views.

```
php artisan make:controller LibraryController
```

This works and shows us our manually created items in a very simplistic HTML layout. Now let's see the power of seeders to quickly fill a database with test data.

```
php artisan make:seed LibrarySeeder
```

And finally, because we are not ever going to actually run this seeder in prod, let's make a few adjustments to make our lives easier.

## Final notes

* I showed how easy it was to paginate the library results, can you paginate the book results?
* Be sure to not inline style in a large project
* Check out the official laravel docs for more on this topic, they really are the best technical docs I've seen in a long long time...
    * https://laravel.com/docs/7.x/database
    * https://laravel.com/docs/7.x/migrations
    * https://laravel.com/docs/7.x/seeding
    * https://laravel.com/docs/7.x/database-testing#generating-factories
