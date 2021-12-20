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

<h1 class="h3 mb-4 text-gray-800">Buat Menu Baru</h1>

<div class="row justify-content-center">

    <div class="container-fluid">

        <div class="row">


            <div class="col-lg-8 order-lg-1">
    
                <div class="card shadow mb-4">
    
                    <div class="card-header py-3">
                        {{-- <h6 class="m-0 font-weight-bold text-primary">My Account</h6> --}}
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('daftar.store') }}"   enctype="multipart/form-data">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" >Nama Menu<span class="small text-danger">*</span></label>
                                            <input class="form-control" required name="nama" placeholder="Masukkan Nama Menu">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" >Kategori<span class="small text-danger">*</span></label>
                                            <div class="form-group">
                                             
                                                <select name="kategori_menu_id" class="form-control" id="exampleFormControlSelect1">
                                                    @foreach ($kategori as $item)
                                                        
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
                                            <label class="form-control-label" >Harga<span class="small text-danger">*</span></label>
                                            <input id="rupiah" class="form-control" required name="harga" placeholder="Masukkan Harga Menu" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" >Deskripsi</label>
                                            <textarea style="min-height: 80px" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi Menu" value=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" >Gambar</label>
                                            <img id="image-preview" alt="image preview"/>
                                            <br/>
                                            <input name="gambar" required type="file" id="image-source" onchange="previewImage();"/>
                                        </div>
                                    </div>
                                </div>
                            </div>


    
                            <!-- Button -->
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col"> 
                                        <a class="btn btn-success" href="{{ route('daftar.index') }}">
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
  var rupiah = document.getElementById("rupiah");
rupiah.addEventListener("keyup", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  rupiah.value = formatRupiah(this.value, "Rp. ");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };

</script>
@endpush