@extends('layouts.admin')
@push('css')
    <link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Buat Pesanan Pelanggan</h1>

    <div class="row justify-content-center">

        <div class="container-fluid">

            <div class="row">


                <div class="col-lg-12 order-lg-1">

                    <div class="card shadow mb-12">

                        <div class="card-header py-3">
                            {{-- <h6 class="m-0 font-weight-bold text-primary">My Account</h6> --}}
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('pesanan.store') }}">
                                @csrf
                                {{-- <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" >Kode Pesanan<span class="small text-danger">*</span></label>
                                            <input disabled  class="form-control" required name="kode" value="">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}



                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Pilih Meja<span
                                                        class="small text-danger">*</span></label>
                                                <div class="form-group">

                                                    <select name="meja" class="form-control" id="meja">
                                                        @foreach ($meja as $item)

                                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Catatan</label>
                                                <textarea style="min-height: 80px" class="form-control" name="deskripsi"
                                                    placeholder="Masukkan Catatan Tambahan" value=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">

                                                <button class="btn btn_open_modal_menu btn-primary">
                                                    Masukkan Menu
                                                </button>

                                                <button class="btn btn_simpan btn-primary">
                                                    Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="modal_menu" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      

                                      
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Input Menu Pesanan</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form id="form-menu">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-control-label">Pilih Menu<span
                                                                        class="small text-danger">*</span></label>
                                                                <div class="form-group">
    
                                                                    <select name="nama" class="form-control" id="nama">
                                                                        @foreach ($menu as $item)
    
                                                                            <option data-nama="{{ $item->nama }}"
                                                                                value="{{ $item->id }}">
                                                                                {{ $item->nama }}</option>
    
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-control-label">Jumlah<span
                                                                        class="small text-danger">*</span></label>
                                                                <div class="form-group">
    
                                                                    <input type="number" id="jumlah" name="jumlah" value="1"
                                                                        class="form-control" required name="kode" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                </form>
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="button"
                                                    class="btn_tambahkan btn btn-primary">Tambahkan</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead style="background-color: #4e73df; color:white">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>id</th>
                                                    <th>Jumlah</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <!-- Button -->
                                {{-- <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col"> 
                                        <a class="btn btn-success" href="{{ route('kategori.index') }}">
                                           kembali
                                        </a>
                                        <button type="submit" class="btn btn-success">Buat Pesanan</button>
                                    </div>
                                </div>
                            </div> --}}
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
@push('scripts')


    <script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": false,
                "bInfo": false,
                "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                    var oSettings = this.fnSettings();
                    $("td:first", nRow).html(oSettings._iDisplayStart + iDisplayIndex + 1);
                    return nRow;
                }
            });

            var counter = 0;

            $('.btn_tambahkan').on('click', function() {
                table.row.add([
                    '',
                    $('#nama option:selected').data('nama'),
                    $('#nama option:selected').val(),
                    $('#jumlah').val(),
                    ` <a data-row=${counter} class="btn btn_hapus btn-danger">Hapus</a>`,
                ]).draw();
                $('#modal_menu').modal('hide');


                counter++;
            });

            $('.btn_open_modal_menu').on('click', function(e) {
                e.preventDefault();

          
                $("#modal_menu").modal('show');
                          
            });

            $('.btn_simpan').on('click', function(e) {
                e.preventDefault();

                const data = [];
                var array_table = table
                    .rows()
                    .data()
                    .toArray();

                for (let index = 0; index < array_table.length; index++) {
                    data.push({
                        id: array_table[index][2],
                        nama: array_table[index][1],
                        jumlah: array_table[index][3],
                    });
                }

                console.log(data);
            });







            $('#dataTable tbody').on('click', '.btn_hapus', function() {
                table
                    .row($(this).parents('tr'))
                    .remove()
                    .draw();
            });


        });
    </script>
@endpush
