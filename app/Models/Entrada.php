<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entrada extends Model
{
    use HasFactory;
    protected $guarded =[];

    //Una Entrada pertenece a una Categoria
    public function categoria():BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
    //Una entrada pertenece a un User
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    //Una Entrada tiene muchos Comentarios
    public function comentarios():HasMany
    {
        return $this->hasMany(Comentario::class);
    }
    
    
}
