<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrdenResource\Pages;
use Filament\Forms\Components\Number;
use App\Filament\Resources\OrdenResource\RelationManagers;
use App\Models\Orden;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Set;
use Filament\Forms\Get;
use App\Models\Producto;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Currency;
use Illuminate\Support\Number as SupportNumber;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use App\Filament\Resources\OrdenResource\RelationManagers\DireccionRelationManager;

class OrdenResource extends Resource
{
    protected static ?string $model = Orden::class;

    protected static ?string $label = 'Orden';
    protected static ?string $pluralLabel = 'Ordenes';

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Datos del cliente')->schema([
                            Select::make('user_id')
                                ->label('Cliente')
                                ->relationship('user', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),

                            Select::make("metodo_pago")
                                ->label('Método de pago')
                                ->options([
                                    'tarjeta' => 'Tarjeta',
                                    'efectivo' => 'Pagar con efectivo cuando se le entregue el pedido',
                                ])
                                ->required(),

                            Select::make("estado_pago")
                                ->label('Estado del pago')
                                ->options([
                                    'pendiente' => 'Pendiente',
                                    'pagado' => 'Pagado',
                                    'cancelado' => 'Cancelado',
                                ])
                                ->default('pendiente')
                                ->required(),

                            ToggleButtons::make('estado')
                                ->label('Estado de la orden')
                                ->inline()
                                ->default('pendiente')
                                ->required()
                                ->options([
                                    'pendiente' => 'Pendiente',
                                    'procesando' => 'Procesando',
                                    'enviado' => 'Enviado',
                                    'entregado' => 'Entregado',
                                    'cancelado' => 'Cancelado',
                                ])
                                ->colors([
                                    'pendiente' => 'info',
                                    'procesando' => 'warning',
                                    'enviado' => 'success',
                                    'entregado' => 'success',
                                    'cancelado' => 'danger',
                                ])
                                ->icons([
                                    'pendiente' => 'heroicon-o-clock',
                                    'procesando' => 'heroicon-m-arrow-path',
                                    'enviado' => 'heroicon-m-truck',
                                    'entregado' => 'heroicon-o-check-circle',
                                    'cancelado' => 'heroicon-o-x-circle',
                                ]),

                            Select::make('tipo_moneda')
                                ->label('Tipo de moneda')
                                ->options([
                                    'PEN' => 'Soles',
                                    'USD' => 'Dólares',
                                ])
                                ->default('PEN')
                                ->required(),

                            Select::make('metodo_compra')
                                ->label('Método de envio')
                                ->options([
                                    'olva courier' => 'Olva Courier',
                                    'dhl' => 'DHL',
                                    'shalom' => 'Shalom',
                                    'marvisur' => 'Marvisur',
                                ]),
                            
                            Textarea::make('notas')
                                ->label('Notas')
                                ->columnSpanFull(),
                        ])->columns(2),
                    
                        Section::make('Productos del pedido')->schema([
                            Repeater::make('ordenItems')
                                ->label('Items')
                                ->relationship('ordenItems')
                                ->schema([
                                    Select::make('producto_id')
                                        ->label('Producto')
                                        ->relationship('producto', 'nombre')
                                        ->searchable()
                                        ->preload()
                                        ->required()
                                        ->distinct()
                                        ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                        ->columnSpan(4)
                                        ->reactive()
                                        ->afterStateUpdated(fn ($state, Set $set) => $set('precio_unitario', Producto::find($state)?->precio ?? 0))
                                        ->afterStateUpdated(fn ($state, Set $set) => $set('precio_total', Producto::find($state)?->precio ?? 0)),

                                    TextInput::make('cantidad')
                                        ->label('Cantidad')
                                        ->numeric()
                                        ->required()
                                        ->default(1)
                                        ->minValue(1)
                                        ->columnSpan(2)
                                        ->reactive()
                                        ->afterStateUpdated(fn ($state, Set $set, Get $get) => $set('precio_total', $get('precio_unitario') * $state)),
                                    
                                    TextInput::make('precio_unitario')
                                        ->label('Precio unitario')
                                        ->numeric()
                                        ->required()
                                        ->disabled()
                                        ->dehydrated()
                                        ->columnSpan(3),
                                    
                                    TextInput::make('precio_total')
                                        ->label('Precio total')
                                        ->numeric()
                                        ->required()
                                        ->dehydrated()
                                        ->columnSpan(3),
                                ])->columns(12),

                                Placeholder::make('total')
                                    ->label('Monto total a pagar')
                                    ->content(function (Get $get, Set $set){
                                        $total = 0;
                                        if(!$repeaters = $get('ordenItems')){
                                            return $total;
                                        }

                                        foreach($repeaters as $key => $repeater){
                                            $total += $get("ordenItems.{$key}.precio_total");
                                        }
                                        $set('total', $total);

                                        return SupportNumber::currency($total, $get('tipo_moneda'));
                                    }),

                                    Hidden::make('total')
                                        ->default(0),
                        ])
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('total')
                    ->label('Monto total a pagar')
                    ->numeric()
                    ->sortable()
                    ->money('PEN'),
                
                TextColumn::make('metodo_pago')
                    ->label('Método de pago')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('estado_pago')
                    ->label('Estado del pago')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('tipo_moneda')
                    ->label('Tipo de moneda')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('metodo_compra')
                    ->label('Método de envio')
                    ->searchable()
                    ->sortable(),
                
                SelectColumn::make('estado')
                    ->label('Estado de la orden')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'procesando' => 'Procesando',
                        'enviado' => 'Enviado',
                        'entregado' => 'Entregado',
                        'cancelado' => 'Cancelado',
                    ])
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('created_at')
                    ->label('Fecha de creación')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                TextColumn::make('updated_at')
                    ->label('Fecha de actualización')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
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
            DireccionRelationManager::class,
        ];
    }

    public static function getNavigationBadge(): ?string 
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string | array | null
    {
        return static::getModel()::count() > 10 ? "success" : "warning";
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrdens::route('/'),
            'create' => Pages\CreateOrden::route('/create'),
            'view' => Pages\ViewOrden::route('/{record}'),
            'edit' => Pages\EditOrden::route('/{record}/edit'),
        ];
    }
}
