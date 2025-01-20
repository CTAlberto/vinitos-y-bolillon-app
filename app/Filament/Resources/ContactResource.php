<?php

namespace App\Filament\Resources;

use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\IconPosition;


class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;
    protected static ?string $modelLabel = 'Contacto';
    protected static ?string $navigationIcon = 'heroicon-m-bookmark-square';

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
                    ->email()
                    ->label('Email'),
                Forms\Components\Textarea::make('reason')
                    ->required()
                    ->placeholder('Ej: Me gustaría asistir al evento')
                    ->maxLength(255)
                    ->label('Mensaje'),
                TextInput::make('tel')
                    ->tel()
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
                    ])->default('pending')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('Nombre'),
                TextColumn::make('email')
                    ->searchable()
                    ->icon('heroicon-m-envelope')
                    ->label('Email')
                    ->copyable()
                    ->copyMessage('Email address copied')
                    ->iconPosition(IconPosition::After)
                    ->copyMessageDuration(1500),
                TextColumn::make('tel')
                    ->searchable()
                    ->icon('heroicon-m-phone')
                    ->iconPosition(IconPosition::After)
                    ->label('Teléfono'),
                TextColumn::make('validation')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'accept' => 'success',
                        'refused' => 'danger',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'pending' => 'Pendiente',
                        'accept' => 'Aceptado',
                        'refused' => 'Rechazado',
                        default => $state, // Por si llega un estado inesperado
                    })
            ])
            ->filters([
                SelectFilter::make('validation')
                    ->options([
                        'pending' => 'Pendiente',
                        'accept' => 'Aceptado',
                        'refused' => 'Rechazado',
                    ]),

            ])
            ->actions([
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
