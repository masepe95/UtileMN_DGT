<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\ImageColumn;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Actions\ModalAction;
use Filament\Tables\Actions\Action;
use App\Models\TyfonAppointment;
use App\Models\TyfonIntervention;
use Filament\Tables\Enums\ActionsPosition;

class AppointmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'appointments';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('idAppuntamento'),
                Forms\Components\TextInput::make('interventions.statoIntervento'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('idAppuntamento'),
                Tables\Columns\TextColumn::make('dataAppuntamento'),
                Tables\Columns\TextColumn::make('note'),
                Tables\Columns\TextColumn::make('statoSegnalazione'),
                Tables\Columns\TextColumn::make('annullato'),
            ])

            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make('viewInterventions'),
            ])
            ->actions([
                Action::make('viewInterventions')
                    ->label('Visualizza Interventi')
                    ->action(fn (TyfonAppointment $record) => $record->load('interventions'))
                    ->action(fn (TyfonAppointment $record) => $record->load('interventions.products'))
                    ->modalContent(fn (TyfonAppointment $record) => view('admin.interventions-modal', ['interventions' => $record->interventions]))
                    ->modalWidth('7xl'),
            ], position: ActionsPosition::BeforeColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
