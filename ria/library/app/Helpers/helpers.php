<?php

	function dateFormat($value){
		return date('H:i:s - d M Y', strtotime($value));
	}

	function dateDifference($date_1, $date_2, $differenceFormat = '%a')
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = date_diff($datetime1, $datetime2);

    return $interval->format($differenceFormat);
}

function transactionAlert()
{
    $datas = [];
    $currentDate = date('H:i:s - d M Y');
    $transaction = Transaction::where('date_end', '<', $currentDate)
        ->where('status', 0)->get();

    foreach ($transactions as $index => $transaction) {
        $datas[$index]["transaction"] = $transaction->id;
        $datas[$index]["member"] = $transaction->member->name;
        $data[$index]["day_late"] = dateDifference($transaction->date_end, $currentDate);
    }

    return $data;
    function notification(){
        $date = date('Y-m-d');
        $transaction = Transaction::where('transactions.status','=','0')
                                          ->where('transactions.date_end','>',$date)
                                          ->get();
        $datas = [
            'transaction' => $transaction,
            'count' => $transaction->count()
        ];
        return $data;
    }
}



?>