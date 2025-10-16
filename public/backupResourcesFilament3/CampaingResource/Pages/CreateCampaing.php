<?php

namespace App\Filament\Resources\CampaingResource\Pages;

use App\Filament\Resources\CampaingResource;
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
