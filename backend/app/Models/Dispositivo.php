<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dispositivo extends Model
{
    use HasFactory;

    /**
     * Recupera el modelo asociado al dispositivo
     */
    public function modelo(): BelongsTo
    {
        return $this->belongsTo(Modelo::class);
    }
    
    /**
     * Recupera la bodega donde se encuentra el dispositivo
     */
    public function bodega(): BelongsTo
    {
        return $this->belongsTo(Bodega::class);
    }
}
