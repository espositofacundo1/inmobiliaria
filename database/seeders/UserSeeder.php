<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::created([
            'name'=>'user1',
            'email'=>'user1@user1.com',
            'password'=>bcrypt('password')
        ]);


        User::factory(99)->create();
    }
}
