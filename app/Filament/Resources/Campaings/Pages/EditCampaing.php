<?php

namespace App\Filament\Resources\Campaings\Pages;

use App\Filament\Resources\Campaings\CampaingResource;
use App\Models\Campaign;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

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
            ->title('Campanha editada com sucesso!!')
            ->body($this->data['title']);
    }

    protected function beforeSave()
    {
        if(!isset($this->data['id']))
        {
            abort(404, 'Algo deu de errado! contate suporte.');
        }

        $campaing = Campaign::find($this->data['id']);

        if(!$campaing)
        {
            abort(404, 'Campanha não encontrada!');
        }

        $imageCampaing = $campaing->image;

        if(reset($this->data['image']) != $imageCampaing )
        {
            Storage::delete("public/" . $imageCampaing);
        }
    }
}
