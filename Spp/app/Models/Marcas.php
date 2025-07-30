<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    public function categorias(): BelongsTo{
        return $this->belongsTo(Categorias::class);
    }
}
