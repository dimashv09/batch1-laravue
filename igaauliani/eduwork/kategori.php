<?php
$berat = 100;
$tinggi =1.78;

//hitung bmi
$bmi=$berat/($tinggi*$tinggi);

//menentukan kategori
if ($bmi < 18.5){
   $kategori= " kurus ";
}elseif ($bmi >= 18.5 && $bmi < 24.9) {
   $kategori="normal";
} else {
    $kategori= "gemuk";
}

//menampilkan
echo "BMI ANDA:". number_format($bmi, 1) ."<br>";
echo "kategori BMI:". $kategori;

?>

<?php  ?>