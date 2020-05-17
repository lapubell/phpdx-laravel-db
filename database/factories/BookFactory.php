<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\Library;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        "title" => $faker->sentence(),
    ];
});

$factory->state(Book::class, 'libraryBook', [
    "library_id" => function () {
        return factory(Library::class)->create()->id;
    }
]);

$factory->state(Book::class, 'checkedOut', [
    "library_id" => function () {
        return factory(Library::class)->create()->id;
    },
    "checked_out_at" => Carbon::now(),
]);
