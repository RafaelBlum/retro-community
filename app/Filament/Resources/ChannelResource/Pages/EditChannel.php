<?php

namespace App\Filament\Resources\ChannelResource\Pages;

use App\Filament\Resources\ChannelResource;
use App\Models\Campaing;
use App\Models\Channel;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditChannel extends EditRecord
{
    protected static string $resource = ChannelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->label("Deletar canal"),
        ];
    }

    protected function beforeSave()
    {
        $channel = Channel::find($this->data['id']);

        $oldImageChannel = $channel->brand;
        $channel->slug = Str::slug($this->data['title'] . '-' . $this->data['id']);
        $channel->save();

        if (reset($this->data['brand']) != $oldImageChannel) {
            if($channel->brand != 'default-brand.png'){
                Storage::delete('public/' . $oldImageChannel);
            }
        }
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Canal atualizado com sucesso!')
            ->body($this->data['title']);
    }
}
