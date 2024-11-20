<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Filament\Resources\OrdenResource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use App\Models\Orden;

class UltimasOrdenes extends BaseWidget
{
    
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;
    
    public function table(Table $table): Table
    {
        return $table
            ->query(OrdenResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('ID pedido'),
                
                TextColumn::make('user.name')
                    ->label('Cliente')
                    ->searchable(),
                
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
            ->actions([
                Action::make('Ver')
                    ->label('Ver pedido')
                    ->url(fn(Orden $record): string => OrdenResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-o-eye')
                    ->color('info'),
            ]);
    }
}
