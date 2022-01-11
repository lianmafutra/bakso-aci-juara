@extends('layouts.admin')
@push('css')
    <!-- Custom fonts for this template -->

    <!-- Custom styles for this page -->
    <link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('plugins/datepicker/css/datepicker.css') }}" rel="stylesheet">

    {{-- <script src="datepicker/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="datepicker/css/datepicker.css"> --}}

@endpush
<style>

</style>
@section('main-content')
    <!-- Page Heading -->
    @if ($tanggal_mulai == null)

        <h1 class="h3 mb-4 text-gray-800">Data Laporan </h1>

    @else
        <h1 class="h3 mb-4 text-gray-800">Data Laporan Tanggal {{ $tanggal_mulai ?? null }} sampai
            {{ $tanggal_akhir ?? null }}</h1>

    @endif

    <div class="row justify-content-left">

        <div class="container-fluid">


            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <form action="{{ route('laporan.filter') }}" method="POST">
                        @csrf
                        <h6 class="m-0 font-weight-bold text-primary"></h6>

                        <div class="row  align-items-end">
                            <div class="form-group col-2">
                                <label>Tanggal Mulai:</label>
                                <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control datepicker"
                                    required />
                            </div>

                            <div class="form-group col-2">
                                <label>Tanggal Akhir:</label>
                                <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control datepicker"
                                    required />
                            </div>

                            <div class="form-group col-2 align-items-end">

                                <a ><button type="submit"
                                        class="btn btn-primary">Terapkan</button></a>
                                        <a href="{{ route('laporan.index') }}"class="btn btn-success">Refresh</a>
                                    </div>


                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- {{ dd($pesanan) }} --}}
                                @foreach ($pesanan as $item)

                                    <tr>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->no_meja }}</td>
                                        <td>{{ $item->total }}</td>
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
    <script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
    <script src="{{ asset('plugins/datepicker/js/bootstrap-datepicker.js') }}"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            //     $(function(){
            //     $("#tanggal_mulai").datepicker({
            //         format: 'yyyy-mm-dd',
            //         autoclose: true,
            //         todayHighlight: true,
            //     });
            // });


            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ],
                columnDefs: [{
                        targets: 2,
                        render: $.fn.dataTable.render.number(',', '.', 0, 'Rp. ')
                    },

                ],
            });




        });
    </script>
@endpush
