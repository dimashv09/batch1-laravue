<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('admin.transaction.index');
    }

    public function api(Request $request)
    {

        if ($request->status) {
            $transactions = Transaction::with(['transaction_details.book', 'member'])
                ->where('status', '=', $request->status == 2 ? 0 : 1)
                ->get();
        } else if ($request->date_start) {
            $transactions = Transaction::with(['transaction_details.book', 'member'])
                ->where('date_start', '>=', $request->date_start)
                ->get();
        } else {
            $transactions = Transaction::with(['transaction_details.book', 'member'])->get();
        }

        $datatables = datatables()->of($transactions)
            ->addColumn('duration', function ($transaction) {
                return dateDifference($transaction->date_start, $transaction->date_end) . " Days";
            })
            ->addColumn('purches', function ($transaction) {
                $purcheses = $transaction->transaction_details->sum('book.price');
                return "Rp. " . number_format($purcheses);
            })
            ->addColumn('statusTransaction', function ($transaction) {
                return $transaction->status ? "Has been returned" : "Not been returned";
            })
            ->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all();
        $books = Book::where('qty', '>=', 1)->get();

        return view('admin.transaction.create', compact('members', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'book_id' => 'required',
            'statusTransaction' => '0',
        ]);

        try {
            // Insert Transactions data into database
            $transactions = Transaction::create([
                'member_id' => $request->member_id,
                'date_start' => $request->date_start,
                'date_end' => $request->date_end,
                'statusTransaction' => false,
            ]);
            // Insert Transaction Details data into database
            if ($transactions) {
                foreach ($request->book_id as $book) {
                    TransactionDetail::create([
                        'transaction_id' => Transaction::latest()->first()->id,
                        'book_id' => $book,
                        'qty' => 1,
                    ]);

                    // update Books Stock
                    $books = Book::find($book);
                    $books->qty -= 1;
                    $books->save();
                }
            }
            DB::commit();
        } catch (\Throwable $error) {
            DB::rollback();
            return $error;
        }

        return redirect('transactions');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $books = Book::where('qty', '>=', 1)->get();
        $transaction_details = TransactionDetail::where('transaction_id', $transaction->id)->get();

        // return $transaction->member->id;
        return view('admin.transaction.show', compact('transaction', 'books', 'transaction_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //create edit transaction
        //create edit transaction
        $members = Member::all();
        $books = Book::where('qty', '>=', 1)->get();
        $transaction_details = TransactionDetail::where('transaction_id', $transaction->id)->get();

        return view('admin.transaction.edit', compact('transaction', 'members', 'books', 'transaction_details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        // Validation data
        $request->validate([
            'member_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'statusTransaction' => 'required',
            'book_id' => 'required',
        ]);

        try {
            // Insert Transactions data into database
            $transactions = Transaction::find($transaction->id)
                ->update([
                    'member_id' => $request->member_id,
                    'date_start' => $request->date_start,
                    'date_end' => $request->date_end,
                    'statusTransaction' => $request->status,
                ]);

            if ($transactions) {
                // Delete all matched transaction Details
                TransactionDetail::where('transaction_id', $transaction->id)->delete();
                // Insert new Transaction Details data into database
                foreach ($request->book_id as $book) {
                    TransactionDetail::create([
                        'transaction_id' => $transaction->id,
                        'book_id' => $book,
                        'qty' => 1,
                    ]);

                    // Update Books Stock
                    $books = Book::find($book);
                    if ($request->status == 1) { // if the book has Returned increment the book stock
                        $books->qty += 1;
                    }
                    $books->update();
                }
            }
            DB::commit();
        } catch (\Throwable $error) {
            DB::rollback();
            return $error;
        }

        return redirect('transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {

        $deleteTransactionDetail = TransactionDetail::where('transaction_id', $transaction->id);
        $deleteTransaction = Transaction::find($transaction->id);
        // Delete data with specific ID
        if ($deleteTransactionDetail->delete()) {
            $deleteTransaction->delete();
        }
    }
}
