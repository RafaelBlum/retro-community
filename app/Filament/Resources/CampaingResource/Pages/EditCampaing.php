<?php

namespace App\Filament\Resources\CampaingResource\Pages;

use App\Filament\Resources\CampaingResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditCampaing extends EditRecord
{
    protected static string $resource = CampaingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('User updated')
            ->body('The user has been saved successfully.');
    }

    protected function beforeSave()
    {
        dd('before Save');
    }
}
