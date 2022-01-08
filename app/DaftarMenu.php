<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarMenu extends Model
{
    use HasFactory;
    protected $table = "daftar_menu";
    protected $guarded = [];

    public function kategoriMenu()
    {
        return $this->belongsTo(KategoriMenu::class);
    }

  
}
