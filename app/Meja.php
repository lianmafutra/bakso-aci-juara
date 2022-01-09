<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    protected $table = "meja";
    protected $guarded = [];

    
    public function pesanan(){
        return $this->hasMany(Pesanan::class);
    }
}
