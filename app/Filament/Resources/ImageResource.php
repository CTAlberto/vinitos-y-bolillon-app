<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageResource\Pages;
use App\Filament\Resources\ImageResource\RelationManagers;
use App\Models\Image;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;



class ImageResource extends Resource
{
    protected static ?string $model = Image::class;
    protected static ?string $modelLabel = 'Imagen';
    protected static ?string $pluralModelLabel = 'Imagenes';

    protected static ?string $navigationIcon = 'heroicon-s-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                    FileUpload::make('name')
                        ->label('Archivo de imagen')
                        ->image()
                        ->directory('images')
                        ->visibility('public')
                        ->required(),

                    Forms\Components\Select::make('fk_id') // Este campo es la clave foránea en la tabla `images`
                    ->label('Evento')
                    ->relationship('event', 'title_event') // Relación definida en el modelo
                    ->required(), // El campo es obligatorio


                    Toggle::make('is_active')
                        ->label('Activo')
                        ->default(true),
                ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('name')
                ->label('Imagen'),
                Tables\Columns\TextColumn::make('event.title_event')
                    ->label('Evento'),
                Tables\Columns\TextColumn::make('event.ini_date')
                    ->label('Fecha de inicio')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->translatedFormat('l, d F Y - H:i')),
                    IconColumn::make('is_active')
                    ->label('Estado')
                    ->boolean()
            ])
            ->filters([
                SelectFilter::make('event_id')
                ->label('Evento')
                ->relationship('event', 'title_event') // Define la relación con la tabla `events`
                ->placeholder('Todos los eventos'),

                SelectFilter::make('is_active')
                    ->label('Activo')
                    ->options([
                        1 => 'Activo',
                        0 => 'Inactivo',
                    ]),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImages::route('/'),
            'create' => Pages\CreateImage::route('/create'),
            'edit' => Pages\EditImage::route('/{record}/edit'),
        ];
    }
}
