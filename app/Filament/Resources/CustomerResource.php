<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomersExport;
use Illuminate\Database\Eloquent\Collection;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('surname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('codice_fiscale')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_of_birth')
                    ->required()
                    ->maxDate(now()),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('address')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        $columns = [
            'name',
            'surname',
            'codice_fiscale',
            'date_of_birth',
            'email',
            'address',
        ];

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('surname')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('codice_fiscale')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(isIndividual: true)
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('export')
                    ->label('Export to Excel')
                    ->button()
                    ->url(function ($record) use ($columns) {
                        $url = route('export.customers', $record->id);
                        $url .= '?columns=' . implode(',', $columns);
                        return $url;
                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                Tables\Actions\BulkAction::make('export')
                    ->label('Export to Excel')
                    ->action(function (Collection $records) use ($columns) {
                        $ids = $records->pluck('id')->join(',');
                        return redirect(route('export.customers', $ids) . '?columns=' . implode(',', $columns));
                    }),
            ])
            ->headerActions([
                Tables\Actions\BulkAction::make('export')
                    ->label('Export to Excel')
                    ->action(function (Collection $records) use ($columns) {
                        $ids = $records->pluck('id')->join(',');
                        return redirect(route('export.customers', $ids) . '?columns=' . implode(',', $columns));
                    }),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
