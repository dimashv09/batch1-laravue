<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create user
        $userAdmin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $userAuthor = User::create([
            'name' => 'author',
            'email' => 'author@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $userPublisher = User::create([
            'name' => 'publisher',
            'email' => 'publisher@gmail.com',
            'password' => bcrypt('password'),
        ]);

    }
}