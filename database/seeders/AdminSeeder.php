<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin id
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
            'email_verified_at' => now()
        ]);

        //user id
        User::create([
            'name' => 'Abir',
            'email' => 'user@mail.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
            'email_verified_at' => now()
        ]);
    }
}
