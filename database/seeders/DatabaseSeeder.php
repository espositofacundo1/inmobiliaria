<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Team;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(30)->create();

        //$this->call(UserSeeder::class);

        \App\Models\Team::factory(10)->create();

        $this->call(CategorySeeder::class);



        
       // \App\Models\Category::factory(6)->create();
      // Post::factory(100)->create();
       \App\Models\Post::factory(80)->create();
    }
}
