<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Note;
use App\Models\User;
use App\Models\NoteCategory;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Initialize Faker
        $faker = Factory::create();

        // Generate 200 users
        for ($i = 0; $i < 200; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // It's better to use a hash for passwords
                'email_verified_at' => now(),
            ]);

            // Each user has 10 books
            for ($j = 0; $j < 10; $j++) {
                $book = Book::create([
                    'user_id' => $user->id,
                    'title' => $faker->word,
                    'description' => $faker->word,
                ]);

                // Each book has 3 categories
                $categoriesTitles = ['fact', 'tips'];
                foreach ($categoriesTitles as $categoryTitle) {
                    $category = NoteCategory::firstOrCreate([
                        'user_id' => $user->id,
                        'book_id' => $book->id,
                        'title' => $categoryTitle,
                    ]);

                    // Each category has 14 notes
                    for ($k = 0; $k < 14; $k++) {
                        Note::create([
                            'book_id' => $book->id,
                            'category_id' => $category->id,
                            'title' => $faker->sentence,
                            'content' => '<div>' . $faker->paragraph . '</div>'
                        ]);
                    }
                }
            }
        }
    }
}
