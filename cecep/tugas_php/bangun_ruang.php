<!DOCTYPEhtml>
<html>
    <head>
        <title><?php echo "bangun ruang";?></title>
    </head>
    <body>
        <?php

            // kubus
            // $c = volume, $a = sisi, $b = sisi, $d = sisi
            $c = "Volume";
            $a = 5;
            $b = 5;
            $d = 5;
            echo "Kubus <br> $c = $a*$b*$d";
            echo "<hr>";

            // Balok
            // $c = volume, $a = panjang, $b = lebar, $d = tinggi
            $c = "Volume";
            $a = 10;
            $b = 5;
            $d = 4;
            echo "Balok <br> $c = $a*$b*$d";
            echo "<hr>";

            // Prisma
            // $c = volume, $a = luas alas, $b = tinggi
            $c = "Volume";
            $a = 8;
            $b = 5;
            echo "Prisma <br> $c = $a*$b";
            echo "<hr>";


        ?>
    </body>