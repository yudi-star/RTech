<?php

namespace App\Filament\Resources\OrdenResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Orden;
use Illuminate\Support\Number;

class OrdenEstadistica extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Ordenes pendientes', Orden::query()->where('estado', 'pendiente')->count()),
            Stat::make('Ordenes procesando', Orden::query()->where('estado', 'procesando')->count()),
            Stat::make('Ordenes enviadas', Orden::query()->where('estado', 'enviado')->count()),
            Stat::make('Ordenes entregadas', Orden::query()->where('estado', 'entregado')->count()),
            Stat::make('Ordenes canceladas', Orden::query()->where('estado', 'cancelado')->count()),
            Stat::make("Precio promedio de los pedidos", Number::currency(Orden::query()->avg('total'), 'PEN')),
        ];
    }
}
