<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body  onload="window.print();>
    <div class="container mt-4">
        {{-- <h3 class="alert alert-success">{{ $pesanan->kode }}</h3> --}}
        <h4 class="">* Bakso Aci Juara Jambi</h4>
        <h5 class="">* 082210310864</h5>
        <span>==================================</span>
        <h6>Kode pesanan : {{ $pesanan->kode }}</h6>
        <h6>Tanggal : {{ Carbon\Carbon::parse($pesanan->waktu)->format('d/m/Y') }}</h6>
        <table border="1" style="width: 100%; margin-top: 20px">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($pesanan->pesanan_detail as $item)
                <tr>
                    <td>
                        {{ $item->nama }}
                    </td>
                    <td>
                        {{ $item->jumlah }}
                    </td>
                    <td>
                        {{ "Rp " . number_format($item->harga,0,',','.')  }}
                    </td>
                    <td>
                        {{ "Rp " . number_format(($item->harga)*$item->jumlah,0,',','.')  }}
                    </td>

                </tr>

                @endforeach

            </tbody>


        </table>

        <h5  style="text-align: right; margin-top: 20px">Total Bayar :  {{ "Rp " . number_format($pesanan->total, 0,',','.')  }}</h5>

    </div>
<script>
     this.print();
</script>
</body>

</html>

