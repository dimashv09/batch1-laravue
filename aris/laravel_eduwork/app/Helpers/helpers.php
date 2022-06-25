<?php 

use App\Models\Transaction;
use Carbon\Carbon;


	function dateFormat($value){
		return date('H:i:s - d M Y', strtotime($value));
	}


	function notificationAlert(){
		$date = date('Y-m-d');
		$data = [];
		$transactions = Transaction::where('date_end','<',$date)
		->where('status', 'belum')->get();

		foreach($transactions as $index=>$transaction)
		{
			$data[$index]['transaction'] = $transaction->id;
			$data[$index]['member'] = $transaction->member->name;
			$data[$index]['late'] = Carbon::parse($transaction->date_end)->floatDiffInDays($date). " day";

			
		}

		return $data;
	}

?>