<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;
    //nos permite añadir campos masivos de pruebas.
    protected $guarded = [];
    //Una Categoria tiene varias Entradas
    public function entradas(): HasMany{
        return $this->hasMany(Entrada::class);
    }
}
