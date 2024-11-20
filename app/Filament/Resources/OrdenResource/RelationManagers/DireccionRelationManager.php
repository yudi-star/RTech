<?php

namespace App\Filament\Resources\OrdenResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class DireccionRelationManager extends RelationManager
{
    protected static string $relationship = 'direccion';
    
    protected static ?string $label = 'Dirección';
    protected static ?string $pluralLabel = 'Direcciones';

    public function form(Form $form): Form{
        return $form
            ->schema([


                TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('apellido')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make("telefono")
                    ->required()
                    ->tel()
                    ->maxLength(9),
                
                TextInput::make("ciudad")
                    ->required()
                    ->maxLength(255),
                
                TextInput::make("distrito")
                    ->required()
                    ->maxLength(255),
                
                TextInput::make("codigo_postal")
                    ->required()
                    ->numeric()
                    ->maxLength(5),
                
                Textarea::make('direccion')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('direccion')
            ->columns([
                TextColumn::make('full_name')
                    ->label('Nombre Completo'),
                TextColumn::make('telefono'),
                TextColumn::make('ciudad'),
                TextColumn::make('distrito'),
                TextColumn::make('codigo_postal'),
                TextColumn::make('direccion'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
