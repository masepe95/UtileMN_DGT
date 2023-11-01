<?php

namespace App\Filament\Resources\TyfonAppointmentResource\Pages;

use App\Filament\Resources\TyfonAppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTyfonAppointments extends ListRecords
{
    protected static string $resource = TyfonAppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
