<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SugerenciaResource\Pages;
use App\Filament\Resources\SugerenciaResource\RelationManagers;
use App\Models\Sugerencia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Table;
use Filament\Tables\Actions;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Carbon\Carbon;
use Faker\Provider\ar_EG\Text;
use Illuminate\Support\Facades\Auth;

class SugerenciaResource extends Resource
{
    protected static ?string $model = Sugerencia::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\Textarea::make('mensaje')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')->label('Nombre')->searchable(),
                TextColumn::make('email')->label('Correo Electrónico')->searchable(),
                TextColumn::make('mensaje')->label('Mensaje')->limit(255),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
               
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSugerencias::route('/'),
            // 'create' => Pages\CreateSugerencia::route('/create'),
            // 'edit' => Pages\EditSugerencia::route('/{record}/edit'),
        ];
    }
}
