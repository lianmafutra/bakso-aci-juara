<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $appends = ['total_harga'];
    protected $guarded = [];

    public function meja(){
        return $this->belongsTo(Meja::class);
    }

    public function pesanan_detail(){
        return $this->hasMany(PesananDetail::class);
    }

    public function getTotalHargaAttribute() {

        $data = $this->relations['pesanan_detail'];
        $harga = 0;

        foreach ($data as $key) {
          $harga +=   $key["harga"] * $key["jumlah"];
        }
        return $harga;

   }

   protected function getWaktuAttribute()
   {
       return \Carbon\Carbon::parse($this->attributes["created_at"])->format("d-m-Y H:i");
   }





}
