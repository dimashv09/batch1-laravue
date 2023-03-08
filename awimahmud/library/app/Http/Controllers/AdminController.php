<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Author;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use Illuminate\Http\Request;
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
    
        $data_donut = Book::select(DB::raw("COUNT(publisher_id) as total"))
                                ->groupBy('publisher_id')
                                ->orderBy('publisher_id', 'asc')
                                ->pluck('total');
        $label_donut = Publisher::orderBy('publishers.id', 'asc')
                                ->join('books', 'books.publisher_id', '=', 'publishers.id')
                                ->groupBy('publishers.name')
                                ->pluck('publishers.name');
        $data_pie = Book::select(Book::raw("COUNT(author_id) as total"))
                                ->groupBy('author_id')
                                ->orderBy('author_id', 'asc')
                                ->pluck('total');
        $label_pie = Author::orderBy('authors.id', 'asc')
                                ->join('books', 'books.author_id', '=', 'authors.id')
                                ->groupBy('name')
                                ->pluck('name');

        
        $label_bar = ['Transactions'];
        $data_bar = [];
        // return $data_bar;
        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];

            $data_month = [];
            
            foreach (range(1, 12) as $month) {
                $total_transactions = Transaction::select(DB::raw("COUNT(*) as total"))
                ->whereMonth('date_start', $month)
                ->first()
                ->total;

                $backgorundColor = 'rgba(100,149,237)';
                $data_month[] = $total_transactions;
                $data_bar[$key]['backgroundColor'] = $backgorundColor;

            }
            
            $data_bar[$key]['data'] = $data_month;
            
            
        }   

        return view('home', compact('total_books','total_members','total_transactions','total_publishers','data_donut','label_donut','data_bar','label_pie','data_pie')); 
        
    }

    public function index()
    {

        $data_book = Book::all();
        $data_member = Member::all();


        return view('admin.transaction.index', compact('data_book', 'data_member'));
    }

    public function test_spatie()
    {
        // $user = User::factory()->create([
        //     'name' => 'Awi Mahmud',
        //     'email' => 'awi21@gmail.com',
        // ]);

        // $user = User::findOrFail(4);

        // $user->assignRole('petugas');

        // return $user;
        // $role = Role::create(['name' => 'petugas']);
        // $permission = Permission::create(['name' => 'index peminjaman']);

        // $role = Role::findOrFail(1);
        // $permission = Permission::findOrFail(1);
        // $roles = $role->givePermissionTo($permission);
        // return $roles;

        // Role::create([
        // 'name' => 'author',
        // 'name' => 'publisher',
            
        
        
    //     function permission(){
    //         $permission1 = Permission::where('id', 2)->first();
    //         $permission2 = Permission::where('id', 3)->first();
    //         $permission3 = Permission::where('id', 4)->first();
    //         $role = Role::findById(1);

    //         return $role->givePermissionTo([$permission1, $permission2, $permission3]);
           
    //     }

    //    permission();
    // ]);
        // Permission::create([
        // 'name' => 'create_data'
        // 'name' => 'edit_data',
        // 'name' => 'delete_data',
            
    // ]);
        // return $user;
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        $user = User::where('id', 2)->first();
        $user->assignRole('petugas');
        return $user;

        // $user = User::with('roles')->get();
        // return $user;

        // $user = auth()->user();
        // $user->removeRole('petugas');


        // $user = User::findOrFail(2);

        // $role1 = Role::findOrFail(1);
        // $role2 = Role::findOrFail(2);
        // $role3 = Role::findOrFail(3);

        // $user->assignRole(['petugas', 'publisher', 'author']);
        
    }
}