<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Mohammed Ismael',
            'email' => 'mohammedismaeal522@gmail.com',
            'password' => bcrypt('password'), // Replace with a secure password
        ]);
    }
}
