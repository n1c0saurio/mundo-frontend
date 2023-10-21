<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marca extends Model
{
    use HasFactory;

    /**
     * Recupera los modelos asociados a una marca
     */
    public function modelos(): HasMany
    {
        return $this->hasMany(Modelo::class);
    }
}
