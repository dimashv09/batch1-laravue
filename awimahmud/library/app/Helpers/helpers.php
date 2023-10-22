<?php

use Carbon\Carbon;
use App\Models\Transaction;

	function convert_date($value) {
		return date('d-m-Y', strtotime($value));
	}
	
	// function total_bayars($value) {
	// 	$transaksi = Transaction::select('sum(transactions.qty *  )
	// }

	function notifikasi() 
    {
        $transactions = Transaction::with('member')->where('status', 'Belum dikembalikan')->get();
        // $notifications = [];
        $message = [];
        foreach($transactions as $transaction){
            $dateEnd = Carbon::parse($transaction->data_end);
            $dateNow =  Carbon::now();
            $selisih = $dateNow->diffInDays($dateEnd, true);
            $member = $transaction->member->name;
            
            	if($selisih != 0 ){
						$message[] = "$member melewati batas waktu $selisih hari";

		}
		
	}
	return $message;
}

  


?>  