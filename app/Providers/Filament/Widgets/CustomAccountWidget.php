<?php

namespace App\Filament\Widgets;

use Filament\Widgets\AccountWidget as BaseAccountWidget;

class CustomAccountWidget extends BaseAccountWidget
{
    /**
     * Obtén el título del widget.
     *
     * @return string
     */
    protected function getTitle(): string
    {
        return 'Perfil';  // Cambiar "Profile" a "Perfil"
    }

    // Si deseas personalizar más detalles, como el contenido, puedes sobreescribir otros métodos aquí.
}
