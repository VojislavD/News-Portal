<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\Category::create([
            'name' => 'uncategorized'
        ]);

        \App\Models\Subcategory::create([
            'name' => 'uncategorized',
            'category_id' => '1'
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(6)->create();
        \App\Models\Article::factory(50)->create();
        \App\Models\Comment::factory(300)->create();
        \App\Models\Tag::factory(100)->create();
        \App\Models\Subcategory::factory(36)->create();

        $faker = Factory::create();

        for($i=0; $i<200; $i++) {
            DB::table('article_tag')->insert([
                'article_id' => $faker->numberBetween(1,50),
                'tag_id' => $faker->numberBetween(1,100),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
