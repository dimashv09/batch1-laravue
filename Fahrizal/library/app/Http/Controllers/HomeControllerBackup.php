<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Catalog;
use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Transaction;
use Illuminate\Http\Request;


use PhpParser\Node\NullableType;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //$members = Member::with('user')->get();
        //return $members;

        //$books = Book::with('publisher')->get();
        //return $books;
        //return $this->hasMany('App\Models\Book', 'publisher_id');

        //$books = Book::with('Author')->get();
        //return $books;
        //return $this->hasMany('App\Models\Book', 'Author_id');

        //$books = Book::with('author')->get();
        //return $books;
        //return $this->hasMany('App\Models\Book', 'author_id');


        //$data = member::select('*')
        //->join('users', 'users.member_id', '=', 'members.id')
        //->get();

        //$data2 = member::select('*')
        //->leftJoin('users', 'users.member_id', '=', 'members.id')
        //->where('users.id', NULL)
        //->get();

        //$data3 = Transaction::select('*')
        //->rightjoin('members', 'members.id', '=', 'transactions.member_id')
        //->where('transactions.member_id', NULL)
        //->get();

        //$data4 = Member::select('members.id', 'members.name', 'members.phone_number')
        //->join('transactions', 'transactions.member_id', '=', 'members.id')
        //->orderBy('members.id', 'asc')
        //->get();

        //$data5 = Member::Select('members.id', 'members.name', 'members.phone_number')
        //->join('transactions', 'transactions.member_id', '=', 'members.id')
        //->groupBy('transactions.member_id')
        //->having('count(transactions.member_id)', '>', 1)
        //->get();

        //$data6 = Member::Select('members.name','members.address','transactions.date_start','transactions.date_end')
        //->join('transactions','transactions.member_id','=','members.id')
        //->get();

        //$data7 = member::Select('members.name','members.phone_number','transactions.date_start',transactions.'date_end')
        //->join('transactions','transactions.member_id','=','members_id')
        //->where('month','date_start','=','6')
        //->get();



        //$data8 = member::select('members.name','members.phone_number','members.addres','transactions.date_start','transactions.date_end')
        //->join('transactions','transactions_member.id','=','members.id')
        //->where('month','date_start','=','5')
        //->get();

        //$data9 = member::select('members.name','members.phone_number','members.addres','transactions.date_start','transactions.date_end')
        //->join('transactions','transactions_member.id','=','members.id')
        //->where('month','date_start','=','6')
        //->and('month','date_finish','6')
        //->get();

        //$data10 = member::select('members.name','members.phone_number','members.addres','transactions.date_start','transactions.date_end')
        //->join('transactions','transactions_member.id','=','members.id')
        //->where('addres')
        //->like('%Gastonburgh%')
        //->get();

        //$data11 = member::select('members.name','members.phone_number','members.addres','transactions.date_start','transactions.date_end')
        //->join('transactions','transactions_member.id','=','members.id')
        //->where('addres')
        //->like('%Gastonburgh%')
        //->gander('L')
        //->get();

        //$data12 = member::select('members.name','members.phone_number','members.addres','members.gander','transactions.date_start','transactions.date_end','books.isbn','transactions.qty')
        //->join('transactions','transaction_member.id','=','members.id')
        //->join('transactions','transactions.id','=','transactions.id')
        //->grouBY('qty')
        //->havingcount('qty','>','1')
        //->get();

        //$data13 = member::select('members.name','members.phone_number','members.addres','members.gander','transactions.date_start','transactions.date_end','books.isbn','transactions.qty','books.tittle','books.price','*','transactions.qty','as','price_total')
        //->join('transactions','transactions.id','=','members.id')
        //->join('transactions','transactions.id','=','transactions.id')
        //->join('books','books.isbn','=','transactions_dtails.isbn')
        //->get();

        //$data14 = member::select('members.name','members.phone_number','transactions.date_stard','transactions.date_end','books.isbn','transactions.qty','books.tittle','authors.name','publishers.name','catalogs.name',)
        //->join('transaction','transactions.id','=','members.id')
        //->join('transaction_dtails','transactions_dtails.id','=','transactions.id')
        //->join('books','books.isbn','=','transactions_dtails.isbn')
        //->get();

        //$data15 = Catalog::select('catalogs.id', 'catalogs.name', 'books.tittle')
        //->join('books', 'books.catalog_id', '=', 'catalogs.id')
        //->get();

        //$data16 = Book::select('isbn', 'tittle', 'books.publisher_id', 'author_id', 'catalog_id', 'price', 'publishers.name')
        //->leftjoin('Publishers', 'publishers.id', '=', 'books.publisher_id')
        //>get();

        //$data17 =  book::select(*)
        //->select(count(authors_id))
        //->where('authors_id','=','pg05',)
        //->get();

        //$data18 = book::select(*)
        //->where('price','>'10000)
        //get();

        //$data19 = book::select(*)
        //->where('publishers_id')
        //->like('100%')
        //->and('qty_stock','>'10)
        //->get();

        //$data20 = member::select(*)
        //->where('month(date_entry)','=','6')
        //->get();

        //return $data20;
        return view('home');
    }
}