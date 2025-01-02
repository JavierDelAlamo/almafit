<?php

namespace App\Policies;

use App\Models\Comentario;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ComentarioPolicy
{
    //Determina si el usuario puede ver cualquier modelo.
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Entrenador']);
    }

    //Determina si el usuario puede ver el modelo.
    public function view(User $user, Comentario $comentario): bool
    {
        return $user->hasAnyRole(['Admin', 'Entrenador']);
    }

    //Determina si el usuario puede crear modelos.
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Entrenador']);
    }

    //Determina si el usuario puede actualizar el modelo.
    public function update(User $user, Comentario $comentario): bool
    {
        return $user->hasAnyRole(['Admin', 'Entrenador']);
    }

    //Determina si el usuario puede eliminar el modelo.
    public function delete(User $user, Comentario $comentario): bool
    {
        return $user->hasAnyRole(['Admin', 'Entrenador']);
    }

    //Determina si el usuario puede restaurar el modelo.
    public function restore(User $user, Comentario $comentario): bool
    {
        return $user->hasAnyRole(['Admin', 'Entrenador']);
    }

    //Determina si el usuario puede eliminar permanentemente el modelo.
    public function forceDelete(User $user, Comentario $comentario): bool
    {
        return $user->hasAnyRole(['Admin', 'Entrenador']);
    }
}
