<?php

namespace Database\Seeders;

Use App\Models\User;
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
        $Admin = User::create([
            'name' => 'Admin Role',
            'email' => 'admin@role.test',
            'password' => bcrypt('12345678')

        ]);

        $Admin->assignRole('admin');
        {
            $user = User::create([
                'name' => 'User Role',
                'email' => 'user@role.test',
                'password' => bcrypt('12345678')
    
            ]);
    
            $user->assignRole('admin');
        }
    }
}
