<?php

use Illuminate\Database\Seeder;
use App\Book;
class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $book=Book::create([
            'name' => 'The 7 Keys to success',
            'author'=> 'Will Edwards',
            'edition'=> 'First Edition',
            'cover'=> 'keystosuccess.jpg'
        ]);

        $book->genres()->attach([15,16]);

        $book=Book::create([
            'name' => 'Alexander the Great',
            'author'=> 'Sean Pattrick',
            'edition'=> 'First Edition',
            'cover'=> 'alexander.jpg'
        ]);

        $book->genres()->attach([16,19]);

        $book=Book::create([
            'name' => 'Taking the Reins',
            'author'=> 'katrina Abbott',
            'edition'=> 'First Edition',
            'cover'=> 'takingthereins.jpg'
        ]);

        $book->genres()->attach([3]);

        $book=Book::create([
            'name' => 'The Ultimate Brain',
            'author'=> 'Shireen Stephen',
            'edition'=> 'First Edition',
            'cover'=> 'ultimatebrain.jpg'
        ]);

        $book->genres()->attach([15,16]);
        $book=Book::create([
            'name' => 'How To Win Friends and Influence People',
            'author'=> 'Dale Carnegie',
            'edition'=> 'First Edition',
            'cover'=> 'winfriends.jpg'
        ]);

        $book->genres()->attach([15,16]);
        $book=Book::create([
            'name' => '51 Accidental Inventions',
            'author'=> 'Kimte Guite',
            'edition'=> 'First Edition',
            'cover'=> 'accidental.jpg'
        ]);

        $book->genres()->attach([15,16]);
        $book=Book::create([
            'name' => 'A Tale of Two Cities',
            'author'=> 'Charles Dickens',
            'edition'=> 'First Edition',
            'cover'=> 'taleoftwo.jpg'
        ]);

        $book->genres()->attach([19]);
    }
}
