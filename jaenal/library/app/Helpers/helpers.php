 <?php

    function convert_date($value)
    {
        return date('H:i:s - d M Y', strtotime($value));
    }

    function dateDifference($date_1, $date_2, $differenceFormat = '%a')
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);

        $interval = date_diff($datetime1, $datetime2);

        return $interval->format($differenceFormat);
    }



    ?>