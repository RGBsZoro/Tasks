<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()->count(10)->create();
        $categories = Category::all();

        $users->each(function ($user) use ($categories) {
            Book::factory()
                ->count(rand(1,10))
                ->for($user)
                ->for($categories->random())->create();
        });
    }
}
