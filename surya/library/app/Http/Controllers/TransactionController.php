<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        return view('admin.transaction.index');
    }

    public function api(Request $request)
    {
        if ($request->status) {
            $transactions = Transaction::with(['transactionDetails.book', 'member'])
                            ->where('status', '=', $request->status == 2 ? 0 : 1)
                            ->get();
        } else if ($request->date_start) {
            $transactions = Transaction::with(['transactionDetails.book', 'member'])
                            ->where('date_start', '>=', $request->date_start)
                            ->get();
        } else {
            $transactions = Transaction::with(['transactionDetails.book', 'member'])->get();
        }

        $datatables = datatables()->of($transactions)->addColumn('duration', function ($transaction) {
            return dateDifference($transaction->date_start, $transaction->date_end) . " Days";
        })->addColumn('purches', function ($transaction) {
            $purcheses = $transaction->transactionDetails->sum('book.price');
            return "Rp. " . number_format($purcheses);
        })->addColumn('statusTransaction', function ($transaction) {
            return $transaction->status ? "Has Been Returned" : "Not Returned Yet";
        })->addIndexColumn();

        return $datatables->make(true);
    }

    public function create()
    {
        $members = Member::all();
        $books   = Book::where('qty', '>=', 1)->get();

        return view('admin.transaction.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id'  => 'required',
            'date_start' => 'required',
            'date_end'   => 'required',
            'book_id'    => 'required',
        ]);

        try {
            // Insert Transactions data into database
            DB::beginTransaction();
            $transactions = Transaction::create([
                'member_id'  => $request->member_id,
                'date_start' => $request->date_start,
                'date_end'   => $request->date_end,
                'status'     => false,
            ]);
            // Insert Transaction Details data into database
            if ($transactions) {
                foreach ($request->book_id as $book) {
                    TransactionDetail::create([
                        'transaction_id' => Transaction::latest()->first()->id,
                        'book_id'        => $book,
                        'qty'            => 1,
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

        return redirect('transactions')->with('success', 'New transaction data has been Added');
    }

    public function show(Transaction $transaction)
    {
        $books              = Book::where('qty', '>=', 1)->get();
        $transactionDetails = TransactionDetail::where('transaction_id', $transaction->id)->get();

        return view('admin.transaction.show', compact('transaction', 'books', 'transactionDetails'));
    }

    public function edit(Transaction $transaction)
    {
        $members            = Member::all();
        $books              = Book::where('qty', '>=', 1)->get();
        $transactionDetails = TransactionDetail::where('transaction_id', $transaction->id)->get();

        return view('admin.transaction.edit', compact('members', 'books', 'transaction', 'transactionDetails'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'member_id'  => 'required',
            'date_start' => 'required',
            'date_end'   => 'required',
            'status'     => 'required',
            'book_id'    => 'required',
        ]);

        try {
            // Insert Transactions data into database
            $transactions = Transaction::find($transaction->id)->update([
                'member_id'  => $request->member_id,
                'date_start' => $request->date_start,
                'date_end'   => $request->date_end,
                'status'     => $request->status,
            ]);

            if ($transactions) {
                // Delete all matched transaction Details
                TransactionDetail::where('transaction_id', $transaction->id)->delete();
                // Insert new Transaction Details data into database
                foreach ($request->book_id as $book) {
                    TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'book_id'        => $book,
                    'qty'            => 1,
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

        return redirect('transactions')->with('success', 'Transaction data has been Updated');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect('transactions')->with('success', 'Transaction data has been Deleted');
    }
}
