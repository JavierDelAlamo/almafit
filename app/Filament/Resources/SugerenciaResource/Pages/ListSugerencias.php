<?php

namespace App\Filament\Resources\SugerenciaResource\Pages;

use App\Filament\Resources\SugerenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSugerencias extends ListRecords
{
    protected static string $resource = SugerenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
