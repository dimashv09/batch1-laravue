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
  
        //create user
        $userAdmin = User::findOrfail(26);
        $userAuthor = User::findOrfail(27);
        $userPublisher = User::findOrfail(28);

        //get all admin permission
        $adminPermissions = Permission::all();

        //get permission author
        $dataAuthor = ['home', 'admin.author.index', 'admin.author.create'];
        $authorPermissions = Permission::whereIn('name', $dataAuthor)->get();

        //get permission publisher
        $dataPublisher = ['home', 'admin.publisher.index', 'admin.publisher.create', 'admin.publisher.edit', 'admin.publisher.delete'];
        $publisherPermissions = Permission::whereIn('name', $dataPublisher)->get();

        //get role admin
        $adminRole = Role::where('name', 'admin')->first();
        //get role author
        $authorRole = Role::where('name', 'author')->first();
        //get role publisher
        $publisherRole = Role::where('name', 'publisher')->first();

        //assign permission to role
        $adminRole->syncPermissions($adminPermissions);
        $authorRole->syncPermissions($authorPermissions);
        $publisherRole->syncPermissions($publisherPermissions);

        //assign role to user
        $userAdmin->assignRole($adminRole);
        $userAuthor->assignRole($authorRole);
        $userPublisher->assignRole($publisherRole);
        
    }
}