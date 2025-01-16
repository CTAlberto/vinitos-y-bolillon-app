<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;
    protected static ?string $modelLabel = 'Contacto';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(50)
                    ->label('Nombre'),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->maxLength(50)
                    ->label('Email'),
                Forms\Components\Textarea::make('reason')
                    ->required()
                    ->label('Mensaje'),
                TextInput::make('tel')
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->label('Teléfono')
                    ->placeholder('Ej: +34 123 456 789'),
                Select::make('event_id')
                    ->label('Evento')
                    ->relationship('event', 'title_event')
                    ->required(),
                Select::make('validation')
                    ->label('Validación')
                    ->placeholder('Selecciona una opción')
                    ->options([
                        'accept' => 'Aceptado',
                        'pending' => 'Pendiente',
                        'refused' => 'Rechazado',
                    ])
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nombre'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                Tables\Columns\TextColumn::make('tel')
                    ->searchable()
                    ->label('Teléfono'),
                Tables\Columns\TextColumn::make('event.title_event')
                    ->searchable()
                    ->label('Evento'),
                TextColumn::make('validation')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'accept' => 'success',
                        'rejected' => 'danger',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'pending' => 'Pendiente',
                        'accept' => 'Aceptado',
                        'rejected' => 'Rechazado',
                        default => $state, // Por si llega un estado inesperado
                    })
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
