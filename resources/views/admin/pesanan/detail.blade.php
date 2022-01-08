@extends('layouts.admin')
@push('css')
<link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush
@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Detail Pesanan </h1>

<div class="row justify-content-center">

    <div class="container-fluid">

        <div class="row">


            <div class="col-lg-8 order-lg-1">
    
                <div class="card shadow mb-4">
    
                    <div class="card-header py-3">
                        <a class="btn btn-success" href="{{ route('pesanan.index') }}">
                            kembali
                         </a>
                         <a style="float: right; margin-left: 10px" class="btn btn-secondary" href="">
                            cetak Struk
                         </a>
                        <div style="float: right"  class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Ubah Status
                            </button>
                            <div style="font-size: 14px" class="dropdown-menu">
                                <form action="{{ url('pesanan/status/1/menunggu') }}" method="POST">
                                    @csrf 
                                    @method('PUT') 
                                    <button type="submit" class="dropdown-item">menunggu</button>
                                </form>
                            
                                <form action="{{ url('pesanan/status/1/diproses') }}" method="POST">
                                    @csrf 
                                    @method('PUT') 
                                    <button type="submit" class="dropdown-item">diproses</button>
                                </form>
                                <form action="{{ url('pesanan/status/1/selesai') }}" method="POST">
                                    @csrf 
                                    @method('PUT') 
                                    <button type="submit" class="dropdown-item">selesai</button>
                                </form>
                              <div class="dropdown-divider"></div>
                              <form action="{{ url('pesanan/status/1/dibatalkan') }}" method="POST">
                                @csrf 
                                @method('PUT') 
                                <button type="submit" class="dropdown-item">dibatalkan</button>
                            </form>
                            </div>
                          </div>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('kategori.store') }}" >
                            @csrf
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div style="font-size: 14px" class="form-group">
                                            Kode Pesanan : {{ $pesanan->kode }}
                                            <br> Meja : {{ $pesanan->meja->nama }}
                                            <br> Waktu Pesan : {{ $pesanan->waktu }}
                                            <br> Pelayan : {{ $pesanan->pelayan }}
                                            <br> Status :   @if ($pesanan->status == "menunggu")
                                            <span class="badge badge-secondary">{{ $pesanan->status }}</span>
                                        @elseif ($pesanan->status == "diproses")
                                            <span class="badge badge-warning">{{ $pesanan->status }}</span>
                                        @elseif ($pesanan->status == "selesai")
                                            <span class="badge badge-success">{{ $pesanan->status }}</span>
                                        @elseif ($pesanan->status == "dibatalkan")
                                            <span class="badge badge-danger">{{ $pesanan->status }}</span>
                                        @endif
                                            <br>
                                            <div style="margin-top: 20px" class="card mb-4 py-3 border-left-secondary">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                            <thead style="background-color: #4e73df; color:white">
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Gambar</th>
                                                                    <th>Nama</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Harga</th>
                                                                </tr>
                                                            </thead>
                                                       
                                                        <tbody>
                                                            @foreach ($pesanan->pesanan_detail as $index => $item )
                                                            <tr>
                                                                <td style="width: 10px">{{ $index+1 }}</td>
                                                                <td style="width: 200px">
                                                                    <img width="200px" height="150px" src="{{ URL::asset('/uploads/'.$item->daftar_menu->gambar) }}">
                                                                </td>  
                                                                <td>{{ $item->nama }}</td>
                                                                <td>X {{ $item->jumlah }}</td>
                                                                <td data-harga="{{ $index }}"> {{ $item->harga }}</td>
                                                             
                                                            </tr>
                                                            @endforeach
                                                          
                                                        </tbody>
                                                    </table>
                                           
                                                    
                                                    </div>
                                                </div>
                                          
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col"> 
                                           
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Button -->
                           
                        </form>
    
                    </div>
    
            </div>
            <div class="col-lg-4 order-lg-1">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                       <h3>Total Harga : </h3> 
                       <strong><h1 id="total_harga"></h1></strong>
                       <br>
                    </div>
                </div>
            </div>
    
        </div>

    </div>

</div>

@endsection
@push('scripts')
<script src="{{ URL::asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script> 
<script>


$('#total_harga').text(formatRupiah((@json($pesanan->total_harga)).toString(), 'rp. '));

function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

$('#dataTable').DataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bInfo": false,
        columnDefs: [    
            {
                targets:4,
                render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp. ' )
            },
            ],
        });
</script>
@endpush