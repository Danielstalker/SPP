<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    public function products(): HasMany{
        return $this->hasMany(Marcas::class);
    }
}
