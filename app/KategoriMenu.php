<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriMenu extends Model
{
    use HasFactory;
    protected $table = "kategori_menu";
    protected $guarded = [];

    public function daftar_menu(){
        return $this->hasMany(DaftarMenu::class);
    }
}
