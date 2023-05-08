<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permission dashboard
        Permission::create(['name' => 'dashboard', 'guard_name' => 'web']);

        //Permission author
        Permission::create(['name' => 'author.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'author.create', 'guard_name' => 'web']);

        //Permission books
        Permission::create(['name' => '.book.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'book.create', 'guard_name' => 'web']);

        //Permission catalog
        Permission::create(['name' => 'catalog.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'catalog.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'catalog.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'catalog.delete', 'guard_name' => 'web']);

        //Permission category
        Permission::create(['name' => 'category.index', 'guard_name' => 'web']);

        //Permission member
        Permission::create(['name' => 'member.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'member.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'member.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'member.detele', 'guard_name' => 'web']);

        //Permission publisher
        Permission::create(['name' => 'publisher.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'publisher.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'publisher.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'publisher.delete', 'guard_name' => 'web']);

        //Permission transaction
        Permission::create(['name' => 'transaction.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'transaction.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'transaction.detail', 'guard_name' => 'web']);
        Permission::create(['name' => 'transaction.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'transaction.delete', 'guard_name' => 'web']);

        //Permission transaction detail
        Permission::create(['name' => 'transaction_detail.index', 'guard_name' => 'web']);
    }
}