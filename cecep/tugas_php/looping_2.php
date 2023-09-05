<!DOCTYPE html>
<html>

<head>
    <title>Cara Membuat Looping For di dalam Tabel</title>
    <style>
        table {
            width: 300px;
            text-align: center;
            margin: auto;
        }

        table th {
            background-color: greenyellow;
        }

        h2 {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h2>Looping table</h2>
    
</body>

</html>
<form>
    <table border="1"  cellpaadding="10" cellspacing="0">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>KELAS</th>
        </tr>
        <?php for ($no = 1, $i = 10, $a = 10; $i >= 1, $a >= 1; $i -= 1, $a -= 1) { ?>
        <tr>
            <td>
                <?php echo $no; ?>
            </td>
            <td>
                <?php echo "Nama Ke $i " ?>
            </td>
            <td>
                <?php echo "Kelas $a" ?>
            </td>
        </tr>
        <?php $no++;
        } ?>
    </table>
</form>