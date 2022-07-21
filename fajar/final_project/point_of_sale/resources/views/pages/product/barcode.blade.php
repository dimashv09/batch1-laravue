<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Barcode</title>

    <style>
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    {{-- DNS2D::getBarcodeHTML('4445645656', 'QRCODE') --}}

    <table width="100%">
        <tr>
            @foreach ($dataproduct as $produk)
                <td class="text-center" style="border: 1px solid #333;">
                    <p>{{ $produk->product_name }} - Rp. {{ money_format($produk->sell_price) }}</p>
                    <img src="data:image/png;base64,{{\DNS2D::getBarcodePNG($produk->product_code, 'QRCODE')}}"  
                        alt="{{ $produk->product_code }}"
                        width="180"
                        height="60"> 
                </td>
            @endforeach
        </tr>
    </table>
</body>
</html>