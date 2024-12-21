<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EntradaResource\Pages;
use App\Filament\Resources\EntradaResource\RelationManagers;
use App\Models\Entrada;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Illuminate\Support\Str;


class EntradaResource extends Resource
{
    protected static ?string $model = Entrada::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    //"label" Ponemos Usuario como encabezado de columna. Unicamente visual.
                    //No afecta a la estructura de la BBDD ni el modelo.
                    ->label('Usuario')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('categoria_id')
                    ->relationship('categoria', 'nombre')
                    ->required(),
                Forms\Components\TextInput::make('titulo')
                    //Agregamos que se actualice en tiempo real
                    ->live(onBlur:true)
                    //cuando se haya actualizado el estado de titulo(cuando salte a otro componente),
                    // Que lo pase al campo etiqueta 
                    ->afterStateUpdated(fn (Set $set, ?string $state)=> $set('slug', Str::slug($state)))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    //Deshabilitamos el campo para no poder poner nada.
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('cuerpo')
                    ->required()
                    ->columnSpanFull(),
                //La imagen es de tipo FileUploap para poder subir la imagen a local.
                Forms\Components\FileUpload::make('image_url')
                    ->image()
                    ->required()
                    
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuario'),
                    // ->numeric()
                    //->sortable(),
                Tables\Columns\TextColumn::make('categoria.nombre'),
                    
                    //->sortable(),
                Tables\Columns\TextColumn::make('titulo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('etiqueta')
                    ->searchable(),
                Tables\Columns\TextColumn::make('image_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListEntradas::route('/'),
            'create' => Pages\CreateEntrada::route('/create'),
            'edit' => Pages\EditEntrada::route('/{record}/edit'),
        ];
    }
}
