<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;
    protected $table = 'pesanan_detail';
    

    public function daftar_menu()
    {
        return $this->belongsTo(DaftarMenu::class);
    }


    protected function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes["created_at"])->format("d-m-Y H:i");
    }
 
   
}
