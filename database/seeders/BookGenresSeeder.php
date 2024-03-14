<?php

namespace Database\Seeders;

use App\Models\BookGenre;
use Illuminate\Database\Seeder;

class BookGenresSeeder extends Seeder
{

    public function run(): void
    {
        BookGenre::insert([
            ['title' => 'Biography'],
            ['title' => 'Autobiography'],
            ['title' => 'Memoir'],
            ['title' => 'Self-Help'],
            ['title' => 'History'],
            ['title' => 'Travel'],
            ['title' => 'True Crime'],
            ['title' => 'Philosophy'],
            ['title' => 'Religion'],
            ['title' => 'Science'],
            ['title' => 'Cookbooks'],
            ['title' => 'Art and Photography'],
            ['title' => 'Personal Development'],
            ['title' => 'Health and Fitness'],
            ['title' => 'Politics'],
            ['title' => 'Business'],
            ['title' => 'Economics'],
            ['title' => 'Essay Collections'],
            ['title' => 'Journalism'],
        ]);        
    }
}
