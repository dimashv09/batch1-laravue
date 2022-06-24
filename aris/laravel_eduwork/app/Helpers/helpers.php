<?php 

use App\Models\Transaction;



	function dateFormat($value){
		return date('H:i:s - d M Y', strtotime($value));
	}


	function alert(){
		$date = date('Y-m-d');
		$transactions = Transaction::where('date_end','<','$date')
		->where('status', 0)->get();

		foreach($transactions as $transaction)
		{
			$transaction[0]['transaction'] = $transaction->id;
			$transaction[0]['member'] = $transaction->member->name;
			$transaction[0]['late'] = Carbon::parse($transaction->date_end)->floatDiffInDays($date). " day";

			
		}
	}

?>