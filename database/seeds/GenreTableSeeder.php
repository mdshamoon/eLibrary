<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $genre_names=[ 'Fantasy',
        'Adventure',
        'Romance',
        'Contemporary',
        'Dystopian',
        'Mystery',
        'Horror',
        'Thriller',
        'Paranormal',
        'Historical fiction',
        'Science Fiction',
        'Memoir',
        'Cooking',
        'Art',
        'Self-help / Personal',
        'Development',
        'Motivational',
        'Health',
        'History',
        'Travel',
        'Guide / How-to',
        'Families & Relationships',
        'Humor',
        'Children’s'];

        foreach($genre_names as $genre)
        Genre::create(['genre'=> $genre]);
        

       
    }
}
