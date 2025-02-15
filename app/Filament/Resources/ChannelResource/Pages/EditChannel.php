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

        $brandImagem = $channel->brand;

        if (reset($this->data['brand']) != $brandImagem) {
            if($channel->brand != 'default-brand.png'){
                Storage::delete('public/' . $brandImagem);
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

    protected function afterSave()
    {
        $channel = Channel::with('camping')->find($this->data['id']);
        $channel->slug = Str::slug($this->data['link']) . '-' . $this->data['id'];
        $channel->save();
    }
}
