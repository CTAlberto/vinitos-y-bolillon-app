<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\CheckboxList;
use Illuminate\Support\HtmlString;
use Filament\Tables\Columns\TextColumn;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $modelLabel = 'Evento';
    protected static ?string $navigationIcon = 'heroicon-s-calendar';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\CheckboxList::make('instructor')
                    ->relationship('instructors', 'name')
                    ->label('Instructores'),
                Select::make('id_category')
                    ->label('Categoría')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('title_event')
                    ->required()
                    ->maxLength(200)
                    ->label('Título del evento'),
                Forms\Components\Textarea::make('subtitle')
                    ->required()
                    ->maxLength(250)
                    ->label('Subtitulo'),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->helperText(new HtmlString('Your <strong>full name</strong> here, including any middle names.'))
                    ->label('Descripción'),
                Forms\Components\TextArea::make('content')
                    ->required()
                    ->helperText('Formato CSV, separado por punto y coma')
                    ->placeholder('Ej: El Proceso de Vinificación;Elegir el vino adecuado;Etiquetas: Como leerlas')
                    ->label('Contenido'),
                Forms\Components\TextArea::make('requirements')
                    ->required()
                    ->placeholder('Ej: Mayor de edad;Conocimientos previos en cata;Traer botella de agua')
                    ->label('Requisitos'),
                DateTimePicker::make('ini_date')
                    ->required()
                    ->label('Fecha de inicio'),
                DateTimePicker::make('end_date')
                    ->required()
                    ->label('Fecha de fin'),
                Forms\Components\TextInput::make('location')
                    ->required()
                    ->label('Lugar'),
                Forms\Components\ViewField::make('map')
                    ->view('components.map')
                    ->label('Seleccionar ubicación en el mapa'),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->suffix('€')
                    ->label('Precio'),
                Forms\Components\TextInput::make('capacity')
                    ->required()
                    ->integer()
                    ->label('Capacidad'),
                Select::make('language')
                    ->required()
                    ->options([
                        'Español' => 'Español',
                        'Inglés' => 'Inglés',
                        'Francés' => 'Francés',
                        'Portugués' => 'Portugués',
                        'Italiano' => 'Italiano',
                    ])
                    ->label('Idioma'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('instructors.name')
                    ->searchable()
                    ->label('Instructores'),
                TextColumn::make('category.name')
                    ->searchable()
                    ->label('Categoría'),
                TextColumn::make('title_event')
                    ->searchable()
                    ->label('Título del evento'),
                TextColumn::make('subtitle')
                    ->searchable()
                    ->label('Subtítulo'),
                TextColumn::make('description')
                    ->searchable()
                    ->label('Descripción'),
                TextColumn::make('ini_date')
                    ->searchable()
                    ->label('Fecha de inicio')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->translatedFormat('l, d F Y - H:i')),
                TextColumn::make('end_date')
                    ->searchable()
                    ->label('Fecha de fin')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->translatedFormat('l, d F Y - H:i')),
                TextColumn::make('price')
                    ->searchable()
                    ->label('Precio'),
                TextColumn::make('location')
                    ->searchable()
                    ->label('Lugar'),
                TextColumn::make('capacity')
                    ->searchable()
                    ->label('Capacidad'),
                TextColumn::make('language')
                    ->searchable()
                    ->label('Idioma'),
                TextColumn::make('latitude')
                    ->label('Latitud'),
                TextColumn::make('longitude')
                    ->label('Longitud'),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}

