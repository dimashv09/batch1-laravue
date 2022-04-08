<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TransactionDetail;
use App\Models\Transaction;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\Member;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function home(){
    //     $total_member = Member::count();
    //     $total_book = Book::count();
    //     $total_transaction = Transaction::whereMonth('date_start', date('m'))->count();
    //     $total_publisher = Publisher::count();

    //     $data_donut = Book::select(DB::raw("COUNT(publisher_id) as total"))->groupBy('publisher_id')->orderBy('publisher_id','asc')->pluck('qty');
    //     $label_donut = Publisher::orderBy('publishers.id','asc')->join('books', 'books.publisher_id', '=', 'publishers.id')->groupBy('name')->pluck('name');

    //     $label_bar = ['Transaction'];
    //     $data_bar = [];

    //     foreach ($label_bar as $key => $value) {
    //         $data_bar[$key]['label'] = $label_bar[$key];
    //         $data_bar[$key]['backgroundColor'] = 'rgba(60,141,188,0.9)';
    //         $data_month = [];

    //         foreach (range(1,12) as $month) {
    //             $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('start_date', $month)->first()->total;
    //         }

    //         $data_bar[$key]['data'] = $data_month;
    //     }

    //     return view('admin.home', compact('total_member','total_book','total_transaction','total_publisher'));
    // }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function test_spatie(){
        // $role = Role::create(['name' => 'officer']);
        // $permission = Permission::create(['name' => 'index transaction']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        $user = auth()->user();
        $user->assignRole('officer');
        return $user;
        
        // $user = User::where('id', 2)->first();
        // $user->assignRole('officer');
        // return $user;
        
        // $user = auth()->user();
        // $user->removeRole('officer');

        // $user = User::where('id', 2)->first();
        // $user->removeRole('officer');

        // $user = User::with('roles')->get();
        // return $user;


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $total_member = Member::count();
        $total_book = Book::count();
        $total_transaction = Transaction::whereMonth('date_start', date('m'))->count();
        $total_publisher = Publisher::count();

        $data_donut = Book::select(Book::raw("COUNT(publisher_id) as total"))->groupBy('publisher_id')->orderBy('publisher_id','asc')->pluck('total');
        $data_pie = Book::select(Book::raw("COUNT(author_id) as total"))->groupBy('author_id')->orderBy('author_id','asc')->pluck('total');
        $label_donut = Publisher::orderBy('publishers.id','asc')->join('books', 'books.publisher_id', '=', 'publishers.id')->groupBy('name')->pluck('name');
        $label_pie = Author::orderBy('authors.id','asc')->join('books', 'books.author_id', '=', 'authors.id')->groupBy('name')->pluck('name');


        $label_bar = ['Borrow','Return'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key == 1 ? 'rgba(60,141,188,0.9)' : 'rgba(210,214,222,1)';
            $data_month = [];

            foreach (range(1,12) as $month) {
                if ($key == 0){
                $data_month[] = Transaction::select(Transaction::raw("COUNT(*) as total"))->whereMonth('date_start', $month)->first()->total;
                }else{
                $data_month[] = Transaction::select(Transaction::raw("COUNT(*) as total"))->whereMonth('date_end', $month)->first()->total;
                }
            }

            $data_bar[$key]['data'] = $data_month;
        }

        return view('home', compact('total_member','total_book','total_transaction','total_publisher', 'data_donut','label_donut','data_bar','data_pie','label_pie'));
    }
}
