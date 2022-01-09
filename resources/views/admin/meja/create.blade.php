@extends('layouts.admin')
@push('css')

@endpush
@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Tambah Meja Baru</h1>

<div class="row justify-content-center">

    <div class="container-fluid">

        <div class="row">


            <div class="col-lg-4 order-lg-1">
    
                <div class="card shadow mb-4">
    
                    <div class="card-header py-3">
                        {{-- <h6 class="m-0 font-weight-bold text-primary">My Account</h6> --}}
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('meja.store') }}" >
                            @csrf
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" >Nama Meja<span class="small text-danger">*</span></label>
                                            <input id="" class="form-control" required name="nama" placeholder="Masukkan Nama Meja" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Button -->
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col"> 
                                        <a class="btn btn-success" href="{{ route('meja.index') }}">
                                           kembali
                                        </a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
    
                    </div>
    
                </div>
    
            </div>
    
        </div>

    </div>

</div>

@endsection
@push('scripts')
<script src="{{ URL::asset('plugins/jquery/jquery.min.js') }}"></script>
<script>
  
</script>
@endpush