<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>looping 2</title>
</head>
<body>
<table border="1" cellpadding="10" cellspacing="0">
    <?php 
        for ( $a = 1; $i <= 1; $i++ ) {
            echo "<tr>";
            for( $a = 1; $a <= 1; $a++) {
                echo "<td>1</td>";
            }
            for( $a = 1; $a <= 1; $a++) {
                echo "<td>Nama Ke </td>";
            }
            for( $a = 1; $a >= 0; $a--) {
                echo "<td>Kelas</td>";
            }
            echo "</tr>";
            }
    ?>

</table>
    
</body>
</html>