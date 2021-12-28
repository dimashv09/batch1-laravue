<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $books;
    protected $members;

    public function  __construct()
    {
        $this->members = Member::all();
        $this->books = Book::where('stock', '>', 0)->get();
    }

    public function index()
    {
        return view('admin.transactions.index');
    }

    public function getData(Request $request)
    {
        $transactions = Transaction::all();

        $datatables = Datatables::of($transactions)
                    ->addColumn('action', function($transactions) {
                        $button = '<a href="'.route('transaction.edit', ['transaction' => $transactions->id] ).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                        $button .= '<a href="'.url('transaction/'. $transactions->id).'" class="btn mx-1 btn-xs btn-info"><i class="glyphicon glyphicon-show"></i> Detail</a>';
                        $button .= '<a href="#" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                        return $button;
                    })
                    ->addColumn('member', function($transactions) {
                        return $transactions->member->name;
                    })
                    ->addColumn('quantity', function($transactions) {
                        return $transactions->books->sum('pivot.qty');
                    })
                    ->addColumn('total_payment', function($transactions) {
                        $total_payment = $transactions->books->sum('pivot.qty') * $transactions->books->sum('price');
                        return "Rp " .  number_format($total_payment, 0, ',', '.') . ",00";
                    })
                    ->addColumn('period', function($transactions) {
                        $range = dateDifference($transactions->start, $transactions->end);
                        return $range;
                    })
                    ->editColumn('start', function($transactions) {
                        return custom_date($transactions->start);
                    })
                    ->editColumn('end', function($transactions) {
                        return custom_date($transactions->end);
                    })
                    ->editColumn('status', function($transactions) {
                        $status = ($transactions->status == 1) ? "sudah dikembalikan" : "belum dikembalikan" ;
                        return $status;
                    })
                    ->removeColumn(['member_id', 'created_at', 'updated_at'])
                    ->make(true);

        return $datatables;

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = $this->members;
        $books = $this->books;
        return view('admin.transactions.create', compact('members', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // lakukan validasi request
        $request->validate([
            'member_id' => 'required',
            'start' => 'required',
            'end' => 'required',
            'book_id' => 'required',
        ]);

        // inisialisasi model transaction
        $transaction = new Transaction();

        // input data dari request yang dikirimkan
        # mengisi tabel utama (transactions tabel)
        $transaction->start = date('Y-m-d', strtotime($request->start));
        $transaction->end = date('Y-m-d', strtotime($request->end));
        $transaction->member_id = $request->member_id;
        $transaction->status = false;
        $transaction->save();

        # isi tabel pivot (transaction_details)
        // isi kolom book_id dengan request (book_id) yang dikirimkan berserta dengan kolm qty dengan nilai 1.
        $transaction->books()->attach($request->book_id, ['qty' => 1]);

        // update stock buku
        foreach ($request->book_id as $id) {
            $book = Book::find($id); // ambil data buku yang ID-nya = nilai ke-n dalam pengulangan ini.
            $book->stock -= 1; // ubah data pada kolom stok dengan - 1
            $book->save(); // simpan data
        }

        return redirect('transaction')->with('success', 'Yeeaayy, Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {

        return view('admin.transactions.detail', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {

        $members = $this->members;
        $buku = $this->books;
        return view('admin.transactions.edit', compact('transaction', 'members', 'buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
         // lakukan validasi request
         $request->validate([
            'member_id' => 'required',
            'start' => 'required',
            'end' => 'required',
            'book_id' => 'required',
        ]);

        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
