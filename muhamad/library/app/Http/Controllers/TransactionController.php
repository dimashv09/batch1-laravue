<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->can('index transaction')) {
            return view('admin.transaction.index');
        } else {
            return abort('403');
        }
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

        $datatables = datatables()
            ->of($transactions)
            ->addColumn('duration', function ($transaction) {
                return dateDifference($transaction->date_start, $transaction->date_end) . " Days";
            })
            ->addColumn('purches', function ($transaction) {
                $purcheses = $transaction->transactionDetails->sum('book.price');
                return "Rp. " . number_format($purcheses);
            })
            ->addColumn('statusTransaction', function ($transaction) {
                return $transaction->status ? "Has been returned" : "Not returned yet";
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->book_id;
        // Validation data
        $request->validate([
            'member_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'book_id' => 'required',
        ]);

        try {
            // Insert Transactions data into database
            $transactions = Transaction::create([
                'member_id' => $request->member_id,
                'date_start' => $request->date_start,
                'date_end' => $request->date_end,
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

        return redirect('transactions')->with('success', 'New transaction data has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $books = Book::where('qty', '>=', 1)->get();
        $transactionDetails = TransactionDetail::where('transaction_id', $transaction->id)->get();

        // return $transaction->member->id;
        return view('admin.transaction.show', compact('transaction', 'books', 'transactionDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $members = Member::all();
        $books = Book::where('qty', '>=', 1)->get();
        $transactionDetails = TransactionDetail::where('transaction_id', $transaction->id)->get();
        // return $transactionDetails;

        return view('admin.transaction.edit', compact('members', 'books', 'transaction', 'transactionDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        // return $transaction;
        // Validation data
        $request->validate([
            'member_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'status' => 'required',
            'book_id' => 'required',
        ]);

        try {
            // Insert Transactions data into database
            $transactions = Transaction::find($transaction->id)
                ->update([
                    'member_id' => $request->member_id,
                    'date_start' => $request->date_start,
                    'date_end' => $request->date_end,
                    'status' => $request->status,
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

        return redirect('transactions')->with('success', 'Transaction data has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        // Delete data with specific ID
        $transaction->delete();

        return redirect('transactions')->with('success', 'Transaction data has been Deleted');
    }

    public function setRole()
    {
        // //? Setting Role and it's Permission
        // $role = Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'index transaction']);

        // //? Assigning permission into a role
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        //? Create Role for User
        // $user = auth()->user();
        // $user->assignRole('admin');
        // return $user;

        //? Show Users with their Role
        $user = User::with('roles')->get();
        return $user;

        //? Delete Role of User
        // $user = auth()->user();
        // $user->removeRole('admin');
        // return $user;
    }
}
