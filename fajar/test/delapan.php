<?php

$a =15;

for($i=1; $i<=$a; $i++){

    if($i % 3 == 0 && $i % 5 == 0){
        echo "eduwork <br>";
    }elseif ($i % 3 == 0){
        echo "edu <br>";
    }elseif ($i % 5 == 0){
        echo "work <br>";
    }else{
        echo $i . "<br>";
    }

}