<html>
    <head>
        <title>Index Masa Tubuh</title>
    </head>
    <body>
        <h1>Aplikasi Menghitung Index Masa Tubuh</h1>
        <form method="POST" action="">
        	Nama :
            <br>
            <input type="font" name="nama"><br>
            Tinggi Badan :
            <br>
            <input type="number" name="tinggi"> - CM<br>
            Berat Badan :
            <br>
            <input type="number" name="berat"><br>
            <input type="submit" name="hitung" value="Hitung">
        </form>
        <?php 
        if(isset($_POST['hitung'])){
        	echo "Nama : ".$_POST['nama']."<br>";
            echo "Tinggi Badan Anda : ".$_POST['tinggi']."<br>";
            echo "Berat Badan Anda : ".$_POST['berat']."<br>";
            
            $nama = $_POST['nama'];
            $tinggi = $_POST['tinggi']/100; 
            $tinggi_rumus = $tinggi*$tinggi;
            $hasil_tinggi = number_format($tinggi_rumus, 2, '.', '');
            $hasil = $_POST['berat']/$hasil_tinggi;
            $hasil_ahir = number_format($hasil,1, '.', '');
            echo "<b>";
            if($hasil_ahir < 18.5){
                echo "Halo $nama Berat Badan Kurang";
            }else if(($hasil_ahir >= 18.5) && ($hasil_ahir <= 25)){
                echo "Hallo $nama Berat Badan Normal";
            }else if(($hasil_ahir > 24.9) && ($hasil_ahir <=30)){
                echo "Hallo $nama Berat Badan Berlebih";
            }else{
                echo "Halo $nama Berat Badan Obesitas";
            }
            echo "</b>";
        }
        ?>
    </body>
</html>