<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContractsRelationManager extends RelationManager
{
    protected static string $relationship = 'contracts';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('idLead')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('idLead')
            ->columns([
                Tables\Columns\TextColumn::make('idLead'),
                Tables\Columns\TextColumn::make('statoSegnalazione'),
                Tables\Columns\TextColumn::make('tipologiaProdotto'),
                Tables\Columns\TextColumn::make('datastipula'),
                Tables\Columns\TextColumn::make('dataAttivazione'),
                Tables\Columns\TextColumn::make('dataultimamanutenzione'),
                Tables\Columns\TextColumn::make('dataprossimamanutenzione'),
                Tables\Columns\TextColumn::make('datachiusuracontratto'),
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
