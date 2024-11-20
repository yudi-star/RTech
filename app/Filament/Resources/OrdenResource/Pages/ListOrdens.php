<?php

namespace App\Filament\Resources\OrdenResource\Pages;

use App\Filament\Resources\OrdenResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Enums\Tab;
use App\Filament\Resources\OrdenResource\Widgets\OrdenEstadistica;
use Filament\Resources\Components\Tab as ComponentsTab;
use Illuminate\Database\Eloquent\Builder;
class ListOrdens extends ListRecords
{
    protected static string $resource = OrdenResource::class;

    protected function getHeaderActions(): array{
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array{
        return [
            OrdenEstadistica::class,
        ];
    }

    public function getTabs(): array{
        return [
            null => ComponentsTab::make('Todas las ordenes'),
            'pendientes' => ComponentsTab::make()
                ->query(fn(Builder $query) => $query->where('estado', 'pendiente')),
            'procesando' => ComponentsTab::make()
                ->query(fn(Builder $query) => $query->where('estado', 'procesando')),
            'enviado' => ComponentsTab::make()
                ->query(fn(Builder $query) => $query->where('estado', 'enviado')),
            'entregado' => ComponentsTab::make()
                ->query(fn(Builder $query) => $query->where('estado', 'entregado')),
            'cancelado' => ComponentsTab::make()
                ->query(fn(Builder $query) => $query->where('estado', 'cancelado')),
        ];
    }
}
