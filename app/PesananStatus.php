<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananStatus extends Model
{
    use HasFactory;
    protected $table = "pesanan_status";

    public function pesanan(){
        return $this->hasMany(Pesanan::class);
    }

    protected function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes["created_at"])->format("d-m-Y H:i");
    }
 
}
