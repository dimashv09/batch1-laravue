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
            background-color: #95a5a6;
        }

        h2 {
            text-align: center;
            font-style: italic;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>LOOPING TABLE</h2>
    <form>
        <table border="1" cellspacing="0">
            <tr>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>

</html>
<form>
    <table border="1" cellspacing="0">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>KELAS</th>
        </tr>
        <?php for ($no = 1, $i = 1, $a = 1; $i <= 10, $a <= 10; $i += 1, $a += 1) { ?>
        <tr>
            <td>
                <?php echo $no; ?>
            </td>
            <td>
                <?php echo "NAMA MURID  $i " ?>
            </td>
            <td>
                <?php echo "KELAS $a" ?>
            </td>
        </tr>
        <?php $no++;
        } ?>
    </table>
</form>