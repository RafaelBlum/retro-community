<?php

namespace App\Filament\Resources\ChannelResource\Pages;

use App\Filament\Resources\ChannelResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditChannel extends EditRecord
{
    protected static string $resource = ChannelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function beforeSave()
    {
        $user = User::find($this->data['id']);

        $brandImagem = array_values($this->data['brand'])[0];

        if ($user->channel->brand != $brandImagem) {
            if($user->channel->brand != 'default-brand.png'){
                Storage::delete('public/' . $user->channel->brand);
            }
        }
    }

    protected function afterSave()
    {
        $user = User::with('channel')->findOrFail($this->data['id']);
        $channel = $user->channel;
        $user->channel->slug = Str::slug($this->data['link']) . '-' . $this->data['id'];
        $user->channel()->save($channel);
    }
}
