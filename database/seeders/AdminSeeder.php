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
        // get instance of admin role
        $roleAdmin = config('roles.models.role')::where('name', '=', 'Admin')->first();
        // get instance of user role
        // $roleUser = config('roles.models.role')::where('name', '=', 'User')->first();
        // get permissions
        $permissions = config('roles.models.permission')::all();
        //admin id
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
            'email_verified_at' => now()
        ]);
        // assign admin role
        $admin->attachRole($roleAdmin);
        foreach ($permissions as $permission) {
            $admin->attachPermission($permission);
        }

        // //user id
        // $user = User::create([
        //     'name' => 'Abir',
        //     'email' => 'user@mail.com',
        //     'password' => bcrypt('password'),
        //     'is_admin' => false,
        //     'email_verified_at' => now()
        // ]);
        // // assign user role
        // $user->attachRole($roleUser);
    }
}
