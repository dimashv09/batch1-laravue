<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionStore;
use App\Models\Book;
use App\Models\Member;
use App\Models\TransactionDetail;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {

        // $transactions = Transaction::all(); tdk di gunakan krn menggunakan api
        // return view('admin.transaction.index', compact('transactions'));

        return view('admin.transaction.index');
    }

    public function api(Request $request)
    {
        // if ($request->status) {
        //     $transactions = Transaction::with(['transaction_details.book', 'member'])
        //     ->where('status', '=', $request->status == 2 ? 0 : 1)
        //     ->get();
        // } else if ($request->date_start) { 
        //     $transactions = Transaction::with(['transaction_details.book', 'member'])
        //     ->where('date_start', '>=', $request->date_start)
        //     ->get();
        // } else {
        //     $transactions = Transaction::with(['transaction_details.book', 'member'])->get();
        // }

        // $datatables = datatables()
            // ->of($transactions)
            // ->addColumn('duration', function ($transaction) {
            //     return date($transaction->date_start, $transaction->date_end) . " Days";
            // })
            // ->addColumn('purches', function ($transaction) {
            //     $purcheses = $transaction->transactionDetail->sum('book.price');
            //     return "Rp. " . number_format($purcheses);
            // })
            // ->addColumn('statusTransaction', function ($transaction) {
            //     return $transaction->status ? "Has been returned" : "Not returned yet";
            // })
            // ->addIndexColumn();

        $transactions = Transaction::all();
        $datatables = datatables()->of($transactions)->addIndexColumn();

            return $datatables->make(true);
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::all();
        $books = Book::where('qty', '>=', 1)->get();

        return view('admin.transaction.create', compact('members', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaction = Transaction::create([
            'member_id' => $request->member_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => $request->status,

        ]);

        if ($transaction) {
            $books = $request->books;
            foreach ($books as $book) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'book_id' => $book,
                    'qty' => 1
                ]);
            }
        }

        return redirect('transactions');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('admin.transaction.details', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('admin.transaction.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
