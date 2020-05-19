<?php

use App\Book;
use App\Library;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 50 libraries and 100-500 books for each library that was created
        factory(Library::class, 50)->create()->each(function ($library) {
            $booksPerLibrary = rand(100, 500);
            for ($i=0; $i < $booksPerLibrary; $i++) {
                factory(Book::class)->create([
                    "library_id" => $library->id,
                    "checked_out_at" => rand(0, 1) ? Carbon::now() : null,
                ]);
            }
            echo "Created library {$library->id} with {$booksPerLibrary} books" . PHP_EOL;
        });
    }
}
