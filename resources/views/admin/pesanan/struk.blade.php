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

<body onload="window.print();>
    <div class="container mt-4">
        <h3 class="alert alert-success">{{ $pesanan->kode }}</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{ dd($pesanan) }} --}}

                    <tr>
                        <td>
                            {{ $pesanan->kode }}
                        </td>
                        <td>
                            {{ $pesanan->no_meja }}
                        </td>
                        <td>
                            {{ $pesanan->total }}
                        </td>
                    </tr>

            </tbody>
        </table>
        <h1>tes</h1>
    </div>
<script>
     this.print();
</script>
</body>

</html>

