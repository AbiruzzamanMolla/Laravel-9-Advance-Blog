<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // role and permission seeders
        Model::unguard();
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        // $this->call('UsersTableSeeder::class');
        Model::reguard();

        // calling admin seeder
        $this->call([
            AdminSeeder::class,
            WebsiteSettingSeeder::class
        ]);
        // user factory
        \App\Models\User::factory(10)->create();
        // categry factory
        \App\Models\Category::factory(20)->create();
        // tag factory
        \App\Models\Tag::factory(30)->create();
        // post factory
        \App\Models\Post::factory(300)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);\
    }
}
