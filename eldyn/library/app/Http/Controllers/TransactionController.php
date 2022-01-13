<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionStore;
use App\Models\Book;
use App\Models\Member;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
        // return date('Y m d');
        return view('admin.transaction.index');
    }

	public function api() {
		$transactions = Transaction::all();
		$datatables = datatables()->of($transactions)
                    // tambahkan kolom action untuk tombol edit, detail, dan hapus
                    ->addColumn('action', function($transactions) {
                        $btnEdit = '<a href="'.route('transaction.edit', ['transaction' => $transactions->id] ).'" class="btn btn-xs btn-primary">Edit</a>';
                        $btnDetail = '<a href="'.route('transaction.show', ['transaction' => $transactions->id] ).'" class="btn mx-1 btn-xs btn-info">Detail</a>';
                        $btnDelete = "<button onclick='transactionsVue.deleteData(event, $transactions->id)' class='btn btn-xs btn-danger'>Delete</button>";
                        return $btnEdit . $btnDetail . $btnDelete;
                    })
                    // tambahkan kolom member
                    ->addColumn('member', function($transactions) {
                        return $transactions->member->name;
                    })
                    // tambahkan kolom quantity
                    ->addColumn('quantity', function($transactions) {
                        return $transactions->books->sum('pivot.quantity');
                    })
                    // tambahkan kolom total_payment
                    ->addColumn('total_payment', function($transactions) {
                        // ambil jumlah record data dari kolom quantity pada tabel pivot (tranaction_details) * jumlah harga pada setiap buku
                        $total_payment = $transactions->books->sum('pivot.quantity') * $transactions->books->sum('price'); // model = many to many (pivot = transaction_details)
                        return "Rp " .  number_format($total_payment, 0, ',', '.') . ",00";
                    })
                    // tambahkan kolom period
                    ->addColumn('period', function($transactions) {
                        // ambil selisih hari di antara kolom start dan end
                        return date_difference($transactions->date_start, $transactions->date_end);
                    })
                    // tambahkan kolom start
                    ->editColumn('start', function($transactions) {
                        // ambil data start dan parsing data dengan helper yang sudah dibuat sendiri ( convert_date() ).
                        return dateFormat($transactions->date_start);
                    })
                    ->editColumn('end', function($transactions) {
                        // ambil data end dan parsing data dengan helper yang sudah dibuat sendiri ( convert_date() ).
                        return dateFormat($transactions->date_end);
                    })
                    //  tambahkan kolom status
                    ->editColumn('status', function($transactions) {
                        $status = ($transactions->status) ? "Returned" : "Not yet returned" ;
                        return $status;
                    })
                    ->removeColumn(['member_id', 'created_at', 'updated_at']) // hapus kolom member_id
                    ->addIndexColumn() // tambahkan index kolom [0, 1, 2, dst...]
                    ->make(true);

        return $datatables;

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
        $books = Book::where('quantity','>',0)->get();
        return view('admin.transaction.create', compact('members', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionStore $request)
    {
		$data = $request->all();
        $transaction = Transaction::create($data);

        foreach ($data['books'] as $book) {
            $details['book_id'] = $book;
            $details['transaction_id'] = $transaction->id;
            $details['quantity'] = count(array($details['book_id']));
            TransactionDetail::create($details);
        }
        // return $details;
        return redirect(route('transaction.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */

    public function show(Transaction $transaction)
    {
        return view('admin.transaction.details', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $books = Book::all();
        $members = Member::all();
        $details = $transaction->transactionDetail;
        return view('admin.transaction.edit', compact('transaction', 'details', 'books', 'members'));
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
        $data = $request->all();
        $transaction->update($data);
        // return $data['books'];

        TransactionDetail::where('transaction_id', $transaction->id)->delete();
        foreach($data['books'] as $book) {
            $details['book_id'] = (int)$book;
            $details['quantity'] = count(array($details['book_id']));
            $transaction->transactionDetail()->where('transaction_id', $transaction->id)->create($details);
        }
        return redirect(route('transaction.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        TransactionDetail::where('transaction_id', $transaction->id)->delete();
        $transaction->delete();
        return redirect(route('transaction.index'));
    }
}
