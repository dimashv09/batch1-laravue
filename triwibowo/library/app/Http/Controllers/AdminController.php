<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function transaction(){
        if (auth()->user()->role('petugass')){
            return view('admin.transaction.index', [
                'judul' => 'Transaction'
            ]);
        }else{
            return abort('403');
        }
    }

    public function test_spatie(){
        // $role = Role::create(['name' => 'petugas']);
        // $permission = Permission::create(['name' => 'index peminjaman']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // $user = auth()->user();
        // $user->assignRole('petugas');
        // return $user;
    }
}
