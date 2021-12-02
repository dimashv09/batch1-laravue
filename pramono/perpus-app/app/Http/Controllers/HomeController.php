<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        DB::statement("SET SQL_MODE=''");
        // gak tau kenapa kalo gak pake ini muncul error setiap melakukan grouping atau ordering. mau pake model atau pake class DB.(referensi: stackoverflow)

        /*
            No. 1
            SELECT * FROM anggotas
            WHERE EXISTS
            (SELECT * FROM users WHERE users.id_anggota = anggotas.id);
        */
            $query1 = Member::whereHas('user')->get();

        /*
            No. 2
            SELECT * FROM anggotas
            WHERE NOT EXISTS
            (SELECT * FROM users WHERE users.id_anggota = anggotas.id);
        */
            $query2 = Member::whereDoesntHave('user')->get();

        /*
            No. 3
            SELECT id, name FROM anggotas
            WHERE NOT EXISTS
            (SELECT * FROM peminjaman WHERE anggotas.id = peminjaman.id_anggota);
        */

            $query3 = Member::select('id', 'name')->whereDoesntHave('transactions')->get();


        /*
            No. 4
            SELECT id, name FROM anggotas
            WHERE EXISTS
            (SELECT * FROM peminjaman WHERE anggotas.id = peminjaman.id_anggota);
        */
            $query4 = Member::select('id', 'name')->whereHas('transactions')->get();

        /*
            No. 5
            SELECT anggotas.id, anggotas.name, anggotas.telp
            FROM (anggotas
            INNER JOIN peminjaman ON anggotas.id = peminjaman.id_anggota)
            GROUP BY anggotas.id
            HAVING COUNT(peminjaman.id_anggota) > 1;
        */
            $query5 = Member::select('name', 'phone')->has('transactions', '>', 1)->get();

        /*
            No. 6
            SELECT anggotas.name, anggotas.telp, anggotas.alamat, peminjaman.tgl_pinjam, peminjaman.tgl_kembali
            FROM anggotas
            INNER JOIN peminjaman
            ON anggotas.id = peminjaman.id_anggota;
        */

        $query6 = Member::join('transactions', 'members.id', '=', 'transactions.member_id')
                    ->select('members.name', 'members.phone', 'members.address', 'transactions.start', 'transactions.end')
                    ->get();

        /*
            No. 7
            SELECT anggotas.name, anggotas.telp, anggotas.alamat, peminjaman.tgl_pinjam, peminjaman.tgl_kembali
            FROM anggotas
            INNER JOIN peminjaman
            ON anggotas.id = peminjaman.id_anggota
            WHERE peminjaman.tgl_kembali LIKE '2021-06%';
        */

        $query7 = Member::join('transactions', 'members.id', '=', 'transactions.member_id')
                    ->select('members.name', 'members.phone', 'members.address', 'transactions.start', 'transactions.end')
                    ->where('transactions.end', 'like', '2021-06%')
                    ->get();

        /*
            No. 8
            SELECT anggotas.name, anggotas.telp, anggotas.alamat, peminjaman.tgl_pinjam, peminjaman.tgl_kembali
            FROM anggotas
            INNER JOIN peminjaman
            ON anggotas.id = peminjaman.id_anggota
            WHERE peminjaman.tgl_pinjam LIKE '2021-05%';
         */
        $query8 = Member::join('transactions', 'members.id', '=', 'transactions.member_id')
            ->select('members.name', 'members.phone', 'members.address', 'transactions.start', 'transactions.end')
            ->where('transactions.start', 'like', '2021-05%')
            ->get();

        /*
            No. 9
            SELECT anggotas.name, anggotas.telp, anggotas.alamat, peminjaman.tgl_pinjam, peminjaman.tgl_kembali
            FROM anggotas
            INNER JOIN peminjaman
            ON anggotas.id = peminjaman.id_anggota
            WHERE peminjaman.tgl_pinjam LIKE '2021-06%' AND peminjaman.tgl_kembali LIKE '2021-06%';
         */
        $query9 = Member::join('transactions', 'members.id', '=', 'transactions.member_id')
                ->select('members.name', 'members.phone', 'members.address', 'transactions.start', 'transactions.end')
                ->where('transactions.start', 'like', '2021-06%')
                ->orWhere('transactions.end', 'like', '2021-06%')
                ->get();

        /*
            No. 10
            SELECT anggotas.name, anggotas.telp, anggotas.alamat, peminjaman.tgl_pinjam, peminjaman.tgl_kembali
            FROM anggotas
            INNER JOIN peminjaman
            ON anggotas.id = peminjaman.id_anggota
            WHERE anggotas.alamat = "bandung";
         */

        $query10 = Member::join('transactions', 'members.id', '=', 'transactions.member_id')
                ->select('members.name', 'members.phone', 'members.address', 'transactions.start', 'transactions.end')
                ->where('members.address', 'bandung')
                ->get();

        /*
            No. 11
            SELECT anggotas.name, anggotas.telp, anggotas.alamat, peminjaman.tgl_pinjam, peminjaman.tgl_kembali
            FROM anggotas
            INNER JOIN peminjaman
            ON anggotas.id = peminjaman.id_anggota
            WHERE anggotas.alamat = "bandung" AND anggotas.sex = "P";
         */

        $query11 = Member::join('transactions', 'members.id', '=', 'transactions.member_id')
                ->select('members.name', 'members.phone', 'members.address', 'transactions.start', 'transactions.end')
                ->where('members.address', 'bandung')
                ->where('members.gender', 'P')
                ->get();

        /*
            No. 12
            SELECT anggotas.name, anggotas.telp, anggotas.alamat, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, bukus.isbn, detail_peminjaman.qty
            FROM anggotas
            INNER JOIN peminjaman
            ON anggotas.id = peminjaman.id_anggota
            INNER JOIN detail_peminjaman
            ON peminjaman.id = detail_peminjaman.id_peminjaman
            INNER JOIN bukus
            ON detail_peminjaman.id_buku = bukus.id
            HAVING SUM(detail_peminjaman.qty) > 1
        */
        $query12 = DB::table('members')
                    ->join('transactions', 'members.id', '=', 'transactions.member_id')
                    ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
                    ->join('books', 'transaction_details.book_id', '=', 'books.id')
                    ->select('members.name', 'members.phone', 'members.address', 'transactions.start', 'transactions.end', 'books.isbn', 'transaction_details.qty')
                    ->groupBy('members.id')
                    ->havingRaw('SUM(qty) > ?', [1])
                    ->get();

        /*
            No. 13
            SELECT anggotas.name, anggotas.telp, anggotas.alamat, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, bukus.isbn, detail_peminjaman.qty, bukus.judul, bukus.harga_pinjam, detail_peminjaman.qty * bukus.harga_pinjam AS total_harga
            FROM anggotas
            INNER JOIN peminjaman ON anggotas.id = peminjaman.id_anggota
            INNER JOIN detail_peminjaman ON peminjaman.id = detail_peminjaman.id_peminjaman
            INNER JOIN bukus ON detail_peminjaman.id_buku = bukus.id
            GROUP BY detail_peminjaman.id;

        */
        $query13 = Member::join('transactions', 'members.id', '=', 'transactions.member_id')
                ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
                ->join('books', 'transaction_details.book_id', '=', 'books.id')
                ->select('members.name', 'members.phone', 'members.address', 'transactions.start', 'transactions.end', 'books.isbn', 'transaction_details.qty', 'books.title', 'books.price')
                ->selectRaw('qty * price as invoice')
                ->groupBy('transactions.id')
                ->get();

        /*
            No. 14
            SELECT anggotas.name, anggotas.telp, anggotas.alamat, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, bukus.isbn, detail_peminjaman.qty, bukus.judul, penerbits.nama_penerbit, pengarangs.nama_pengarang, katalogs.nama AS katalog
            FROM anggotas
            INNER JOIN peminjaman ON anggotas.id = peminjaman.id_anggota
            INNER JOIN detail_peminjaman ON peminjaman.id = detail_peminjaman.id_peminjaman
            INNER JOIN bukus ON detail_peminjaman.id_buku = bukus.id
            INNER JOIN penerbits ON penerbits.id = bukus.id_penerbit
            INNER JOIN pengarangs ON pengarangs.id = bukus.id_pengarang
            INNER JOIN katalogs ON katalogs.id = bukus.id_katalog
            GROUP BY detail_peminjaman.id;
        */
        $query14 = Member::join('transactions', 'members.id', '=', 'transactions.member_id')
                    ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
                    ->join('books', 'transaction_details.book_id', '=', 'books.id')
                    ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
                    ->join('catalogs', 'books.catalog_id', '=', 'catalogs.id')
                    ->join('writers', 'books.writer_id', '=', 'writers.id')
                    ->select('members.name','members.phone', 'members.address', 'transactions.start', 'transactions.end', 'books.isbn', 'transaction_details.qty', 'books.title', 'publishers.name as publisher', 'writers.name as author', 'catalogs.name as catalog')
                    ->groupBy('transactions.id')
                    ->get();

        /*
            no. 15
            SELECT katalogs.nama AS katalog, bukus.judul
            FROM katalogs
            INNER JOIN bukus ON katalogs.id = bukus.id_katalog
            GROUP BY katalogs.id

        */

        $query15 = Catalog::with('books')->groupBy('id')->get();

        /*
            no. 16
            SELECT * FROM bukus
            WHERE NOT EXISTS
            (SELECT * FROM penerbits WHERE penerbits.id = bukus.id_penerbit);
        */

        $query16 = Book::whereDoesntHave('publisher')->get();

        /*
            no. 17
            SELECT pengarangs.nama_pengarang, COUNT(pengarangs.id) AS Total_pengarang
            FROM bukus
            INNER JOIN pengarangs
            ON bukus.id_pengarang = pengarangs.id
            WHERE pengarangs.nama_pengarang = "Pengarang 05"
            GROUP BY pengarangs.id
        */

        $query17 = Book::join('writers', 'books.writer_id', '=', 'writers.id')
                    ->select('writers.name', DB::raw('COUNT(writers.id) as books'))
                    ->where('writers.name', 'Pengarang 05')
                    ->groupBy('writers.id')
                    ->get();

        /*
            no. 18
            SELECT * FROM bukus WHERE bukus.harga_pinjam > 10000
        */
        $query18 = Book::where('price', '>', 1000)->get();

        /*
            no. 19
            SELECT bukus.judul, penerbits.nama_penerbit, bukus.qty_stok
            FROM bukus
            INNER JOIN penerbits ON bukus.id_penerbit = penerbits.id
            WHERE bukus.qty_stok > 10
        */
        $query19 = Book::with('publisher')->where('stock', '>', 10)->get();

        /*
            no. 20
            SELECT * FROM anggotas
            WHERE created_at LIKE '2021-06%'
            ORDER BY id DESC LIMIT 1;
        */
        // $query20 = DB::table('members')->where('created_at', 'like', '2021-06%')
        //         ->orderByDesc('id')
        //         ->limit(1)
        //         ->get();
        $query20 = Member::whereMonth('created_at','12')->orderByDesc('id')->first();


/***************************************************************************************************/

        // return $query1;
        // return $query2;
        // return $query3;
        // return $query4;
        // return $query5;
        // return $query6;
        // return $query7;
        // return $query8;
        // return $query9;
        // return $query10;
        // return $query11;
        // return $query12;
        // return $query13;
        // return $query14;
        // return $query15;
        // return $query16;
        // return $query17;
        // return $query18;
        // return $query19;
        // return $query20;

        return view('home');

    }
}
