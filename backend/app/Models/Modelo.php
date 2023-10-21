<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modelo extends Model
{
    use HasFactory;

    /**
     * Recupera la marca asociada al modelo
     */
    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class);
    }
    
    /**
     * Recupera los dispositivos asociados a un modelo
     */
    public function dispositivos(): HasMany
    {
        return $this->hasMany(Dispositivo::class);
    }
}
