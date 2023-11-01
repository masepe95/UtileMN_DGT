<?php

namespace App\Filament\Resources\TyfonAppointmentResource\Pages;

use App\Filament\Resources\TyfonAppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTyfonAppointment extends EditRecord
{
    protected static string $resource = TyfonAppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
