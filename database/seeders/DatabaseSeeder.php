<?php

namespace Database\Seeders;

use App\Models\categorie;
use App\Models\product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
    categorie::factory(5)->create()->each(function ($category) {
        product::factory(10)->create(['category_id' => $category->id]);
    });
    }
}
