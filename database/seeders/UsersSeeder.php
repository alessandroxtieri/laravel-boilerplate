<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'password' => bcrypt('password'),
        ]);

        User::whereEncrypted('email', 'admin@example.com')->first()->assignRole('admin');
        User::whereEncrypted('email', 'customer@example.com')->first()->assignRole('customer');
    }
}
