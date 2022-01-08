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



   
}
