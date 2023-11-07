<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\TyfonUser;
use App\Models\TyfonContract;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;

class UserResource extends Resource
{
    protected static ?string $navigationLabel = 'Servizi Tyfon';

    protected static ?string $modelLabel = 'Servizio Tyfon';

    protected static ?string $pluralModelLabel = 'Servizi Tyfon';

    protected static ?string $model = TyfonUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cognome')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('cf')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable()
                    ->label('Codice Fiscale'),
                Tables\Columns\TextColumn::make('ragsoc')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable()
                    ->label('Ragione Sociale'),
                Tables\Columns\TextColumn::make('piva')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable()
                    ->label('Partita IVA'),
                Tables\Columns\TextColumn::make('telefono')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable()
                    ->label('E-Mail'),
                Tables\Columns\TextColumn::make('indirizzo')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('civico')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('cap')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable()
                    ->label('CAP'),
                Tables\Columns\TextColumn::make('comune')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('provincia')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('note')
                    ->toggleable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),

            ], position: ActionsPosition::BeforeColumns)

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),

        ];
    }
    public static function canCreate(): bool
    {
        return false;
    }
}
