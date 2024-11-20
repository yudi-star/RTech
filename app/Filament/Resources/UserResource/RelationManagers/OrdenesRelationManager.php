<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use App\Models\Orden;  
use App\Filament\Resources\OrdenResource;


class OrdenesRelationManager extends RelationManager
{
    protected static string $relationship = 'ordenes';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('id')
                    ->label('ID pedido'),
                
                TextColumn::make('total')
                    ->label('Total')
                    ->money('PEN'),
                
                TextColumn::make("estado")
                    ->label('Estado')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pendiente' => 'warning',
                        'procesando' => 'info',
                        'enviado' => 'success',
                        'entregado' => 'success',
                        default => 'danger',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'pendiente' => 'heroicon-o-clock',
                        'procesando' => 'heroicon-m-arrow-path',
                        'enviado' => 'heroicon-m-truck',
                        'entregado' => 'heroicon-o-check-badge',
                        'cancelado' => 'heroicon-m-x-circle',
                    })
                    ->sortable(),
                
                TextColumn::make('metodo_pago')
                    ->label('Método de pago')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('estado_pago')
                    ->label('Estado de pago')
                    ->sortable()
                    ->badge()
                    ->searchable(),
                
                TextColumn::make('created_at')
                    ->label('Fecha de pedido')
                    ->dateTime(),
                
                
                
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Action::make('Ver')
                    ->url(fn(Orden $record): string => OrdenResource::getUrl('view', ['record' => $record]))
                    ->color('info')
                    ->icon('heroicon-o-eye'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
