<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Book;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total_members = Member::count();
        $total_books = Book::count();
        $total_transactions = Transaction::whereMonth('date_start', date('m'))->count();
        $total_publishers = Publisher::count();

        // Chart donut
        $data_donut = Book::select(DB::raw("COUNT(publisher_id) as total"))
            ->groupBy('publisher_id')
            ->orderBy('publisher_id', 'asc')
            ->pluck('total');

        return $data_donut;

        $label_donut = Publisher::orderBy('publishers.id', 'asc')
            ->join('books', 'books.publisher_id', '=', 'publishers.id')
            ->groupBy('publishers.name')
            ->pluck('publishers.name');

        // Chart Bar
        $label_bar = ['Peminjaman'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['background'] = 'rgba(60, 141, 188, 0.9)';
            $data_month = [];

            foreach (range(1, 12) as $month) {
                $data_month = Transaction::select(DB::raw("Count(*) as total"))
                    ->whereMonth('date_start', $month)
                    ->first()
                    ->total;
            }
            $data_bar[$key]['data'] = $data_month;
        }
        return view('home', compact('total_members', 'total_books', 'total_transactions', 'total_publishers'));
    }

    public function test_spatie()
    {
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