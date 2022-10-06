<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function test_spatie() {
        // $role = Role::create(['name' => 'employee']);
        // $permission = Permission::create(['name' => 'borrowing index']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // $user = Auth::user();
        // return $user;

        $user = Auth::user();
        $user->assignRole('employee');
        return $user;

        // $user = User::with('roles')->get();
        // return $user;

        // $user = Auth::user();
        // $user->removeRole('employee');
        // return $user;
    }
}
