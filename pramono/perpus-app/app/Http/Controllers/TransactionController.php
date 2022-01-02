<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
        // jika ada request status
        if ( $request->status) {
            // parsing terlebih dahulu nilai status menjadi boolean
            $status = ($request->status == 'selesai') ? boolval(1) : boolval(0) ;
            // ambil data peminjaman berdasarkan status yang sudah diparsing
            $transactions = Transaction::where('status',  $status )->get();
        // jika ada request start_date
        } elseif ($request->start_date) {
            // ambil data peminajaman yang tanggal pinjamnya antara request start_date dan end_date.
            $transactions = Transaction::whereBetween('start', [$request->start_date, $request->end_date])->get();
        // selebihnya
        } else {
            // ambil semua data peminjaman
            $transactions = Transaction::orderBy('id', 'desc')->get();
        }

        // buat datatable dari data peminjaman hasil filter dari fungsi di atas
        $datatables = Datatables::of($transactions)
                    // tambahkan kolom action untuk tombol edit, detail, dan hapus
                    ->addColumn('action', function($transactions) {
                        $btnEdit = '<a href="'.route('transaction.edit', ['transaction' => $transactions->id] ).'" class="btn btn-xs btn-primary">Edit</a>';
                        $btnDetail = '<a href="'.url('transaction/'. $transactions->id).'" class="btn mx-1 btn-xs btn-info">Detail</a>';
                        $btnDelete = "<a href='#' onclick='app.destroy(event, $transactions->id)' class='btn btn-xs btn-danger'> Delete</a>";
                        return $btnEdit . $btnDetail . $btnDelete;
                    })
                    // tambahkan kolom member
                    ->addColumn('member', function($transactions) {
                        return $transactions->member->name;
                    })
                    // tambahkan kolom quantity
                    ->addColumn('quantity', function($transactions) {
                        return $transactions->books->sum('pivot.qty');
                    })
                    // tambahkan kolom total_payment
                    ->addColumn('total_payment', function($transactions) {
                        // ambil jumlah record data dari kolom qty pada tabel pivot (tranaction_details) * jumlah harga pada setiap buku
                        $total_payment = $transactions->books->sum('pivot.qty') * $transactions->books->sum('price'); // model = many to many (pivot = transaction_details)
                        return "Rp " .  number_format($total_payment, 0, ',', '.') . ",00";
                    })
                    // tambahkan kolom period
                    ->addColumn('period', function($transactions) {
                        // ambil selisih hari di antara kolom start dan end
                        $range = dateDifference($transactions->start, $transactions->end);
                        return $range;
                    })
                    // tambahkan kolom start
                    ->editColumn('start', function($transactions) {
                        // ambil data start dan parsing data dengan helper yang sudah dibuat sendiri ( custom_date() ).
                        return custom_date($transactions->start);
                    })
                    ->editColumn('end', function($transactions) {
                        // ambil data end dan parsing data dengan helper yang sudah dibuat sendiri ( custom_date() ).
                        return custom_date($transactions->end);
                    })
                    //  tambahkan kolom status
                    ->editColumn('status', function($transactions) {
                        $status = ($transactions->status == 1) ? "selesai" : "dalam proses" ;
                        return $status;
                    })
                    ->removeColumn(['member_id', 'created_at', 'updated_at']) // hapus kolom member_id
                    ->addIndexColumn() // tambahkan index kolom [0, 1, 2, dst...]
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

        // isi data dari request yang dikirimkan
        # isi tabel utama (transactions tabel)
        $transaction->start = date('Y-m-d', strtotime($request->start));
        $transaction->end = date('Y-m-d', strtotime($request->end));
        $transaction->member_id = $request->member_id;
        $transaction->status = $request->status;
        $transaction->update();

        $transaction->refresh();
        # isi tabel pivot (transaction_details)
        // isi kolom book_id dengan request (book_id) yang dikirimkan berserta dengan kolm qty dengan nilai 1.
        $transaction->books()->syncWithPivotValues($request->book_id, ['qty' => 1]);
        // syncWithPivotValues($array_value, ['pivot' => value]) berfungsi untuk menghapus record transaksi terkait di tabel pivot dan menggantinya dengan yang data yang baru

        // update stock buku
        foreach ($request->book_id as $id) {
            $book = Book::find($id); // ambil data buku yang ID-nya = nilai ke-n dalam pengulangan ini.

            if ($request->status == 1) {
                $book->stock += 1; // ubah data pada kolom stok dengan - 1
            } else {
                $book->stock -= 1; // ubah data pada kolom stok dengan - 1
            }

            $book->update(); // simpan data
        }

        return redirect('transaction')->with('success', 'Yeeaayy, Data Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->books()->detach();
        $transaction->delete();
        return response()->json($transaction);
    }
}
