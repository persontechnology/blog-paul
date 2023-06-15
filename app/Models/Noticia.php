<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Noticia extends Model
{
    use HasFactory;


    protected $fillable=[
        'titulo',
        'detalle',
        'tipo_id',
        'foto',
    ];

    public function tipo(): BelongsTo
    {
        return $this->belongsTo(Tipo::class);
    }
}
