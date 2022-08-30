<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    //temporada(Season) pertertence a 1 serie
    public function series(){
        return $this->belongsTo(Serie::class);
    }

    //tempordas tem muitos episodios
    public function episodes(){
        return $this->hasMany(Episode::class);
    }
}
