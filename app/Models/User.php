<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    //Estos son los campos que podemos rellenar
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    //Estos son los  campos que no podemos rellenar
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ]; 
    }
    
     //Un User tiene varias Entradas
     public function entradas():HasMany
     {
         return $this->hasMany(Entrada::class);
     }

     //Funcion para crear el primer usuario por comandos
     public function crearUsuario()
{
    User::create([
        'name' => 'JavierAdmin',
        'email' => 'admin@admin.com',
        'password' => bcrypt('12341234'), // Recuerda cifrar la contraseña
    ]);

    return 'Usuario creado exitosamente';
}

}
