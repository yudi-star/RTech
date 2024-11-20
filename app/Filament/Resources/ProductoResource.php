<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductoResource\Pages;
use App\Filament\Resources\ProductoResource\RelationManagers;
use App\Models\Producto;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\ActionGroup;

class ProductoResource extends Resource
{
    protected static ?string $model = Producto::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Datos del producto')->schema([
                        TextInput::make('nombre')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->disabled()
                            ->dehydrated()
                            ->unique(Producto::class, 'slug', ignoreRecord: true),

                        MarkdownEditor::make('descripcion')
                            ->columnSpanFull()
                            ->fileAttachmentsDirectory('productos')
                            ->required(),
                    ])->columns(2),

                    Section::make("Imagen del producto")->schema([
                        FileUpload::make('imagenes')
                            ->multiple()
                            ->directory('productos')
                            ->maxFiles(5)
                            ->reorderable(),
                    ]),
                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make('Precio del producto')->schema([
                        TextInput::make('precio')
                            ->required()
                            ->numeric()
                            ->prefix('S/'),
                    ]),

                    Section::make("Asociar categorías")->schema([
                        Select::make('categoria_id')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->relationship('categoria', 'nombre'),
                        
                        Select::make('marca_id')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->relationship('marca', 'nombre'),
                    ]),

                    Section::make("Estado del producto")->schema([
                        Toggle::make('en_stock')
                            ->required()
                            ->default(true),

                        Toggle::make('es_activo')
                            ->required()
                            ->default(true),
                        
                        Toggle::make('es_destacado')
                            ->required(),
                        
                        Toggle::make('en_venta')
                            ->required(),
                    ])
                ])->columnSpan(1)

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable(),
                
                TextColumn::make('categoria.nombre')
                    ->sortable(),
                
                TextColumn::make('marca.nombre')
                    ->sortable(),

                TextColumn::make('precio')
                    ->sortable()
                    ->money('PEN'),
                
                IconColumn::make('es_destacado')
                    ->boolean(),
                
                IconColumn::make('en_venta')
                    ->boolean(),
                
                IconColumn::make('en_stock')
                    ->boolean(),
                
                IconColumn::make('es_activo')
                    ->boolean(),
                
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
                SelectFilter::make('categoria')
                    ->relationship('categoria', 'nombre'),
                
                SelectFilter::make('marca')
                    ->relationship('marca', 'nombre'),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductos::route('/'),
            'create' => Pages\CreateProducto::route('/create'),
            'edit' => Pages\EditProducto::route('/{record}/edit'),
        ];
    }
}
