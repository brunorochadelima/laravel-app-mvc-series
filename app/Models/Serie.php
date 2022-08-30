<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];

    // Serie tem relação com temporadas(Season) de 1 para muitos
    public function temporadas() {
        return $this->hasMany(Season::class);
    }
}
