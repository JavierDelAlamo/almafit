<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User; //Añadimos la clase User
use App\Models\Role;
use Filament\Forms;
use Filament\Forms\Components\TextInput; //Añadimos la clase TextInput
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables; //Añadimos la clase Tables
use Filament\Tables\Columns\TextColumn; //Añadimos la clase TextColumn
use Filament\Tables\Table; //Añadimos la clase Table
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select; //Añadimos la clase Select

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Usuarios'; //Añadimos la etiqueta de navegación

    protected static ?string $label = 'Usuario';  //Añadimos la etiqueta de la página

    public static function form(Form $form): Form 
    {
        return $form
            ->schema([
                //Creamos los campos del formulario con los datos de la bbdd
                TextInput::make('name')
                    ->label('Nombre') //Añadimos una etiqueta
                    ->required(), //Validamos que sea requerido
                TextInput::make('email')
                    ->label('Correo electrónico') //Añadimos una etiqueta
                    ->email() //Validamos que sea un email
                    ->unique(ignoreRecord: true) //Validamos que sea único, ignorando el registro actual
                    //podemos modificar el usuario manteniendo el email y volviendo a registrarlo.
                    ->required(), //Validamos que sea requerido
                TextInput::make('password')
                    ->label('Contraseña')
                    ->hiddenOn('edit') //Ocultamos el campo en el formulario de edición
                    ->password() //Ocultamos el texto
                    ->required() //Validamos que sea requerido
                        ->autocomplete('new-password') //Desactivamos el autocompletado
                        ->default('almafit1234'), //Valor por defecto
    
                    //Añadimos un campo select para el rol
                    Select::make('roles')
                        ->multiple()
                        ->relationship('roles', 'name')
                        ->label('Rol')
                        ->required()
                        ->options(Role::all()->pluck('name', 'id')),
                    
            ]);      
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name') //Añadimos una columna con el nombre
                    ->label('Nombre'),
                TextColumn::make('email') //Añadimos una columna con el email
                    ->label('Correo electrónico'),
                TextColumn::make('email_verified_at') //Añadimos una columna con la fecha de verificación del email
                    ->label('Verificado el'),
                TextColumn::make('roles.name') //Añadimos una columna con el rol
                    ->label('Rol'), 






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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
