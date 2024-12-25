<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    use HasFactory;
    protected $guarded =[];
    
    //Un Comentario pertenece a una Entrada
    public function entrada():BelongsTo
    {
        return $this->belongsTo(Entrada::class);
    }

}
