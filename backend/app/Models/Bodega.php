<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bodega extends Model
{
    use HasFactory;

    /**
     * Recupera los dispositivos existentes en la bodega
     */
    public function dispositivos(): HasMany
    {
        return $this->hasMany(Dispositivo::class);
    }
}
