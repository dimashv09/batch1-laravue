<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kartu Member</title>
</head>
<body>
    <section>
        <table width="100%">
            <tr>
                @foreach ($datamember as $key => $data)
                <tr>
                    @foreach ($data as $item)
                        <td class="text-center">
                            <div class="box">
                                {{-- <img src="{{ public_path($setting->path_kartu_member) }}" alt="card" width="50%">
                                <div class="logo">
                                    <p>{{ $setting->nama_perusahaan }}</p>
                                    <img src="{{ public_path($setting->path_logo) }}" alt="logo">
                                </div> --}}
                                <div class="nama">{{ $item->name }}</div>
                                <div class="telepon">{{ $item->phone_number }}</div>
                                <div class="barcode text-left">
                                    <img src="data:image/png;base64, {{ DNS2D::getBarcodePNG("$item->member_code", 'QRCODE') }}" alt="qrcode"
                                        height="45"
                                        widht="45">
                                </div>
                            </div>
                        </td>
                        
                        {{-- @if (count($datamember) == 1)
                        <td class="text-center" style="width: 50%;"></td>
                        @endif --}}
                    @endforeach
                </tr>
            @endforeach
            </tr>
        </table>
    </section>
</body>
</html>