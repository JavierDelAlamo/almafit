<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'entrada_id',
        'user_comentario',
        'email',
        'cuerpo',
        
    ];

    public function entrada(): BelongsTo
    {
        return $this->belongsTo(Entrada::class);
    }
                protected static function boot()
                {
                parent::boot();

                static::creating(function ($comentario) {
                    $comentario->user_comentario = $comentario->user_comentario ?? Auth::user()?->name;
                    $comentario->email = $comentario->email ?? Auth::user()?->email;
                });
                }

    
}
