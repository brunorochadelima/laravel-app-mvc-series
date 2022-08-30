<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Serie extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];

    // Serie tem relação com temporadas(Season) de 1 para muitos
    public function temporadas()
    {
        return $this->hasMany(Season::class , 'series_id');
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('nome');
        });
    }
}
