@extends('layouts.admin')
@push('css')
<!-- Custom fonts for this template -->

<!-- Custom styles for this page -->
<link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

@endpush
@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Pesanan Pelanggan</h1>

<div class="row justify-content-center">

    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                {{-- <a href="{{ route('kategori.create') }}"><button type="submit" class="btn btn-primary">Tambah</button></a> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="background-color: #4e73df; color:white">
                            <tr>
                                <th>No</th>
                                <th>Kode Pesanan</th>
                                <th>Nomor Meja</th>
                                {{-- <th>Makanan</th> --}}
                                {{-- <th>Kategori</th> --}}
                                <th>Tanggal Pesan</th>
                                <th>Status</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pesanan as $index => $item )
                            <tr>
                                <td style="width: 10px">{{ $index+1 }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->meja->nama }}</td>
                                {{-- <td>{{ $item->nama }}</td>   --}}
                                {{-- <td>{{ $item->kategori }}</td>
                                <td>{{ $item->catatan }}</td>   --}}
                                <th>{{ $item->waktu }}</th>

                                <td style="width: 100px; font-size: 17px">
                                    @if ($item->status == "menunggu")
                                        <span class="badge badge-secondary">{{ $item->status }}</span>
                                    @elseif ($item->status == "diproses")
                                        <span class="badge badge-warning">{{ $item->status }}</span>
                                    @elseif ($item->status == "selesai")
                                        <span class="badge badge-success">{{ $item->status }}</span>
                                    @elseif ($item->status == "dibatalkan")
                                        <span class="badge badge-danger">{{ $item->status }}</span>
                                    @endif

                                </td>
                                <td>{{ $item->catatan }}</td>
                                <td style="width: 70px">

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Aksi
                                        </button>
                                        <div style="font-size: 14px" class="dropdown-menu">
                                          <a class="dropdown-item" href="{{ route('pesanan.show', $item->id) }}">Detail</a>

                                          <a target="_blank" class="dropdown-item" href="{{ route('pesanan.struk', $item->id) }}">Cetak Struk</a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item" href="#">Batalkan Pesanan</a>
                                        </div>
                                      </div>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
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
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#dataTable').DataTable();

         $(document).on('click', '#btn_hapus', function (e) {
            e.preventDefault();
            let url = $(this).data('url');

            Swal.fire({
                title: 'Apakah anda yakin Menghapus Kategori '+$(this).data('nama'),
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        success: function(data, textStatus, jqXHR) {
                            location.reload();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            toastr.success('Data Gagal Dihapus');
                        }
                    });
                }
                })
            });
        });

</script>
@endpush
