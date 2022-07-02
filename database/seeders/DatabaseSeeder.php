<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mg Mg',
            'email' => 'mgmg@gmail.com',
            'password' => bcrypt('123123')
        ]);

        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
