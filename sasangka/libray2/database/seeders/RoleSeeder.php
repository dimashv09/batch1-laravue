<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\HasRoles;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin','guard_name' => 'web']
        );
        Role::create(
            ['name' => 'user','guard_name' => 'web']
        );
    }
    
}
