<?php

namespace App\Filament\Resources\Campaings\Pages;

use App\Filament\Resources\Campaings\CampaingResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateCampaing extends CreateRecord
{
    protected static string $resource = CampaingResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return parent::getCreatedNotification()
            ->title("Campanha criada com sucesso!!")
            ->body($this->data['title']);
    }
}
