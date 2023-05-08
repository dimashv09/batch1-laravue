<?php

namespace App\Http\Controllers;

use id;
use DateTime;
use App\Models\Book;
use App\Models\Member;
use RecursiveIterator;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\RequestStack;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response'
     */
    public function index()
    {
        return view('admin.transaction.index');
    }

    // public function status(Request $request)
    // {
    //     if ($request->status) {
    //         $data = Transaction::where('status', $request->status)->get();
    //     } else {
    //         $data = Transaction::all();
    //     }


    //     $datatable = datatables()->of($data)->addIndexColumn();

    //     return $datatable->make(true);
    // }

    public function api(Request $request)
    {
        $transactions = Transaction::with('member', 'details.books')->get();



        if (Request()->input('status')) {
            switch (Request()->input('status')) {
                case '1':
                    $transactions = $transactions->where('status', '=', 'Sudah dikembalikan');
                    break;
                case '2':
                    $transactions = $transactions->where('status', '=', 'Belum dikembalikan');
                    break;
            }
        }elseif(Request()->input('status') == '0' || Request()->input('status') == 'semua'){
            $transactions->where('status', $request->status);
        }

        if ($request->has('date_start')) {
            // $transactions = Transaction::where('date_start', $request->date_start)->get();
            $date_starts = Carbon::parse($request->start_date)->toDateTimeString();
            $transactions = $date_starts;
        }
        $datatables = datatables()->of($transactions)->addIndexColumn()
            ->addColumn('nama', function ($transaction) {

                return $transaction->member->name;
            })
            ->addColumn('date_start', function ($transaction) {
                if ($transaction->date_start ? $transaction->date_start : $transaction);
                return convert_date($transaction->date_start);
            })
            ->addColumn('durasi', function ($transaction) {
                $start = new DateTime($transaction->date_start);
                $end = new DateTime($transaction->date_end);
                $interval = $start->diff($end);
                return $interval->format('%a') . " Hari";
            })
            ->addColumn('total_buku', function ($transaction) {
                return $transaction->details->sum('qty');
            })
            ->addColumn('total_bayar', function ($transaction) {
                if ($transaction->details) {
                    $total_bayar = $transaction->details->sum('books.price') * $transaction->details->sum('qty');
                    return "Rp. " . number_format($total_bayar);
                } else {
                    return '-';
                }
            });

        // ->addIndexColumn();

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
        $transaction = Transaction::with('member', 'details.books');

        $books = Book::select('books.id', 'books.title')
            ->join('transaction_details', 'transaction_details.book_id', '=', 'books.id')
            ->join('transactions', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->join('members', 'members.id', '=', 'transactions.member_id')
            ->groupBy('books.id', 'books.title')
            ->orderBy('books.title')
            ->get();
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
        // dd($request);
        // Validasi input dari form
        $request->validate([
            'member_id' => 'required',
            'date_start' => 'required|date',
            'data_end' => 'required|date|after:date_start',
            'books' => 'required|array|min:1',
        ]);

        // Membuat transaksi baru dengan status 'Belum dikembalikan'
        $transaction = new Transaction();
        $transaction->member_id = $request->member_id;
        $transaction->date_start = $request->date_start;
        $transaction->data_end = $request->data_end;
        $transaction->status = 'Belum dikembalikan';
        $transaction->save();

        // Menyimpan detail transaksi
        foreach ($request->books as $book_id) {
            $book = Book::findOrFail($book_id);

            // Mengecek apakah stok buku mencukupi
            if ($book->qty < 1) {
                return redirect()->back()->withErrors(['msg' => 'Buku "' . $book->title . '" tidak tersedia']);
            }

            // Menyimpan detail transaksi
            $transaction_detail = new TransactionDetail();
            $transaction_detail->transaction_id = $transaction->id;
            $transaction_detail->book_id = $book_id;
            $transaction_detail->qty = 1;
            $transaction_detail->save();

            // Mengurangi stok buku
            $book->qty -= 1;
            $book->save();
        }

        // dd('redirect to transactions.index');
        // Redirect ke halaman transaksi
        return redirect()->route('transactions.index')->withSuccess('Transaksi berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $transaction = Transaction::with('member', 'details.books')->findOrFail($id);
        // dd($transaction);
        return view('admin.transaction.detail', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        // $transaction = Transaction::with('transactionDetail')->findOrFail($id);
        $books = Book::all();
        $members = Member::all();
        $status = $transaction->status;
        $details = $transaction->transactionDetail;
        $date_start = $transaction->date_start;
        $data_end = $transaction->data_end;

        return view('admin.transaction.edit', compact('transaction', 'details', 'books', 'members', 'date_start', 'data_end', 'status'));
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
        //     $validator = Validator::make($request->all(), [
        //         'member_id' => 'required',
        //         'date_start' => 'required|date',
        //         'data_start' => 'required',
        //         'status' => 'required',
        //     ]);

        //      if ($validator->fails()) {
        //         return redirect()->back()->withErrors($validator)->withInput();
        //     } 

        // dd($request->all());

        $transaction->update($request->all());
            
        if ($transaction->status == 0) {
            $transaction->update(['status' => 'Sudah dikembalikan']);
        } else {
            $transaction->update(['status' => 'Belum dikembalikan']);
        }

        if ($transaction) {
            if (is_array($request->books)) {
                foreach ($request->books as $book_id) {
                    $book_id = Book::findOrfail($book_id);
                    $transactionDetail = $transaction->details()->where('book_id', $book_id)->first();

                    $transactionDetail = $transaction->details()->firstOrCreate(['book_id' => $book_id->id]);
                    
                    $transactionDetail->qty += 1;
                    $transactionDetail->update();
                    
                    }
                }
            }
            return redirect('transactions');
        }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
    }
}