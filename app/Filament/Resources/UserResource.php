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
use Filament\Forms\Components\TextInput;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationGroup;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;



class UserResource extends Resource
{
    protected static ?string $navigationLabel = 'MetanoNordServices';

    protected static ?string $modelLabel = 'MetanoNordService';

    protected static ?string $pluralModelLabel = 'MetanoNordServices';

    protected static ?string $model = TyfonUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';



    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(255)
                    ->label('Nome'),
                Forms\Components\TextInput::make('cognome')
                    ->required()
                    ->maxLength(255)
                    ->label('Cognome'),
                Forms\Components\TextInput::make('cf')
                    ->required()
                    ->maxLength(255)
                    ->label('Codice Fiscale'),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->label('E-Mail'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\Action::make('aggiornaAppuntamenti')
                    ->label('AGGIORNA APPUNTAMENTI')
                    ->action(function () {
                        return redirect()->to('/api-proxy');
                    }),

                Tables\Actions\Action::make('aggiornaContratti')
                    ->label('AGGIORNA CONTRATTI')
                    ->action(function () {
                        return redirect()->to('/api-proxy2');
                    }),
            ])
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
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-m-magnifying-glass')
                    ->label('')
                    ->disabledForm(),


            ], position: ActionsPosition::BeforeColumns)

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                Tables\Actions\BulkAction::make('export')
                    ->label('ESPORTA')
                    ->action(function ($records) {
                        $recordCfs = $records->pluck('cf')->toArray();

                        $export = new UsersExport($recordCfs);
                        return Excel::download($export, 'users.xlsx');
                    }),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'edit' => Pages\EditUser::route('/{record}/edit'),

        ];
    }
    public static function canCreate(): bool
    {
        return false;
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('nome'),
                Infolists\Components\TextEntry::make('cognome'),
                Infolists\Components\TextEntry::make('ragsoc'),
                Infolists\Components\TextEntry::make('piva'),

            ])
            ->columns(4);
    }

    public static function getRelations(): array
    {
        return [

            RelationGroup::make('Appuntamenti', [
                RelationManagers\AppointmentsRelationManager::class,

            ]),
            RelationGroup::make('Contratti', [
                RelationManagers\ContractsRelationManager::class,

            ]),
        ];
    }
}
