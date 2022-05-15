<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        DB::table('users')->insert([
            'name' => 'Test User',
            'iniAdmin' => 'admin',
            'email' => 'test@example.com',
            'password' => bcrypt('asdasdasd'),
            'no' => '082138476269'
        ]);
    }
}
