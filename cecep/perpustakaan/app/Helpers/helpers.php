<?php

    use Carbon\Carbon;
    use App\Models\Transaction;

    function convert_date($value) {
        return date('d M Y', strtotime($value));
    }

    function dateDiff($date_1, $date_2, $differenceFormat = '%a')
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);
    
        $interval = date_diff($datetime1, $datetime2);
    
        return $interval->format($differenceFormat);
    }
    
    function transactionNotif()
    {
        $data = [];
        $currentDate = date('Y-m-d');
        $transactions = Transaction::where('date_end', '<', $currentDate)
            ->where('status', 0)->get();
    
        foreach ($transactions as $index => $transaction) {
            $data[$index]["transaction"] = $transaction->id;
            $data[$index]["member"] = $transaction->member->name;
            $data[$index]["day_late"] = dateDiff($transaction->date_end, $currentDate);
        }
    
        return $data;
    }


?>