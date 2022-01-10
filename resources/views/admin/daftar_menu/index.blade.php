@extends('layouts.admin')
@push('css')
<!-- Custom fonts for this template -->

<!-- Custom styles for this page -->
<link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

@endpush
<style>

</style>
@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Daftar Menu</h1>

<div class="row justify-content-center">

    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <a href="{{ route('daftar.create') }}"><button type="submit" class="btn btn-primary">Tambah Menu Baru</button></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Menu</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($daftarMenu as $index => $item )
                            <tr>
                                <td style="width: 10px">{{ $index+1 }}</td>
                                <td style="width: 200px">
                                    <img width="200px" height="150px" src="{{ URL::asset('/uploads/'.$item->gambar) }}">


                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kategoriMenu->nama }}</td>

                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->harga }}</td>
                                <td style="width: 10em">
                                   <a href="{{ route('daftar.edit', $item->id) }}"> <button class="btn btn-primary">Ubah</button></a>
                                    <button id="btn_hapus" data-nama="{{ $item->nama }}" data-url="{{ route('daftar.destroy', $item->id) }}" class="btn btn-danger">Hapus</button>
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



        $('#dataTable').DataTable({
        columnDefs: [
            {
                targets: 5,
                render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp. ' )
            },
            ],
        });




         $(document).on('click', '#btn_hapus', function (e) {
            e.preventDefault();
            let url = $(this).data('url');

            Swal.fire({
                title: 'Apakah anda yakin Menghapus Menu '+$(this).data('nama'),
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
