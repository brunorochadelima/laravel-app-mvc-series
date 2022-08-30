<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    public $timestamps = false;

    //Episodio pertencia a uma temporada
    public function season(){
        return $this->belongsTo(Season::class);
    }
}
