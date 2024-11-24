<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Mohammed Ismael',
            'email' => 'mohammedismaeal522@gmail.com',
            'password' => bcrypt('password'), // Replace with a secure password
            'phone_number' => '+966539249131',
        ]);

        Admin::create([
            'name' => 'Riyaz',
            'email' => 'riyaz@rodud.com',
            'password' => bcrypt('password'), // Replace with a secure password
            'phone_number' => '+966539249131',
        ]);
    }
}
