@extends('layouts.admin')
@push('css')

@endpush
<style>
    #image-preview{
    display:none;
    width : 200px;
    height : 200px;
}
</style>
@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Ubah Data User </h1>

<div class="row justify-content-center">

    <div class="container-fluid">

        <div class="row">


            <div class="col-lg-8 order-lg-1">
    
                <div class="card shadow mb-4">
    
                    <div class="card-header py-3">
                        {{-- <h6 class="m-0 font-weight-bold text-primary">My Account</h6> --}}
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', $user->id) }}"   enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" >Nama Lengkap <span class="small text-danger">*</span></label>
                                            <input class="form-control" value="{{ $user->name }}" required name="name" placeholder="Masukkan Nama Menu">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" >Username <span class="small text-danger">*</span></label>
                                            <input class="form-control" value="{{ $user->username }}" required name="username" placeholder="Masukkan Username">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" >Password <span class="small text-danger">*</span></label>
                                            <input type="password" minlength="3" class="form-control" required name="password" placeholder="Masukkan Password">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" >Role<span class="small text-danger">*</span></label>
                                            <div class="form-group">
                                             
                                                <select name="roles_id" class="roles_id form-control">
                                                    @foreach ($roles as $item)
                                                        
                                                        <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                                             
                                                    @endforeach    
                                                </select>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                          

                      
                    

    
                            <!-- Button -->
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col"> 
                                        <a class="btn btn-success" href="{{ route('user.index') }}">
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
$('.roles_id').val(@json($user->roles_id));
</script>
@endpush