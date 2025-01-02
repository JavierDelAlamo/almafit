<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComentarioResource\Pages;
use App\Filament\Resources\ComentarioResource\RelationManagers;
use App\Models\Comentario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ComentarioResource extends Resource
{
    protected static ?string $model = Comentario::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('entrada_id')
                    ->relationship('entrada', 'titulo')
                    ->required(),
                Forms\Components\TextInput::make('user_comentario')
                    ->default(Auth::user()->name)
                    ->disabled()
                    // ->default(fn() => Auth::user()->name) // Usamos un callback
                    
                    
                    ->required(),
                    
                Forms\Components\TextInput::make('email')
                    ->default(Auth::user()->email)
                    ->disabled()
                    // ->default(fn() => Auth::user()->email) // Usamos un callback
                    
                    ->required(),
                Forms\Components\Textarea::make('cuerpo')
                    ->label('Comentario')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('entrada.titulo'),
                Tables\Columns\TextColumn::make('user_comentario')
                    ->label('Usuario'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('cuerpo')
                    ->label('Comentario'),
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
            'index' => Pages\ListComentarios::route('/'),
            'create' => Pages\CreateComentario::route('/create'),
            'edit' => Pages\EditComentario::route('/{record}/edit'),
        ];
    }
}
