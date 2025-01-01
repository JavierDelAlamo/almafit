<?php

namespace App\Filament\Resources\SugerenciaResource\Pages;

use App\Filament\Resources\SugerenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSugerencia extends EditRecord
{
    protected static string $resource = SugerenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
