<?php

namespace App\Filament\Resources\TyfonAppointmentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContractsRelationManager extends RelationManager
{
    protected static string $relationship = 'contract';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('idService')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('idService')
            ->columns([
                Tables\Columns\TextColumn::make('idService'),
                Tables\Columns\TextColumn::make('tipologiaProdotto'),
                Tables\Columns\TextColumn::make('tipologiaAttivazione'),
                Tables\Columns\TextColumn::make('datadecorrenzacontratto'),
                Tables\Columns\TextColumn::make('datastipula'),
                Tables\Columns\TextColumn::make('dataAttivazione'),
                Tables\Columns\TextColumn::make('dataultimamanutenzione'),
                Tables\Columns\TextColumn::make('dataprossimamanutenzione'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
