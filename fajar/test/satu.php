<?php

//belum solve

function faktorial($angka){

    
    for ($i=$angka; $i < $angka ; $i++){

        if($angka == 1 ){
            return $angka;
        }else if($angka > 2 ) {
            return $angka * $i;
        }

    }
}

print faktorial(5);