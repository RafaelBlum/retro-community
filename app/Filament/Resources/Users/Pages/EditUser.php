<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected static ?string $breadcrumb = 'Edição de usuário';
    protected static ?string $title = "Editar";
    protected static ?string $navigationLabel = "Editar Usuário";

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Deletar usuário')
                ->action(function(User $record) {
                    if($record->avatar !== 'default.jpg'){
                        Storage::delete('public/' . $record->avatar);
                    }
                    Notification::make()
                        ->title('Usuário excluído com sucesso!')
                        ->success()
                        ->send();

                    $record->delete();
                })
                ->requiresConfirmation()
                ->modalHeading('Deletar Usuário')
                ->modalDescription('Tem certeza de que deseja excluir este usuário? Isto não pode ser desfeito.')
                ->modalSubmitActionLabel('Sim, deletar!'),
        ];
    }

    protected function beforeSave()
    {
        $user = User::with('channel.camping')->findOrFail($this->data['id']);
        $channel = $user->channel;

        if (!$user) {
            abort(404, 'Usuário não encontrado');
        }

        $channel->update([
            'title' => $this->data['channel']['title'] ?? $channel->title ,
            'slug' => $this->data['channel']['slug'] ?? $channel->slug ,
            'description' => $this->data['channel']['description'] ?? $channel->description ,
            'link' => $this->data['channel']['link'] ?? $channel->link ,
            'color' => $this->data['channel']['color'] ?? $channel->color ,
        ]);

        $campingData = $this->data['channel']['camping'] ?? null;
        dd($campingData);
//
//        if($campingData && !empty($campingData['title']))
//        {
//            dd("camping", $campingData);
//        }

        $avatarImagem = $user->avatar;
        $newAvatar = reset($this->data['avatar']);

        if ($avatarImagem !== $newAvatar) {
            if($avatarImagem != 'default.jpg'){
                $oldAvatar = 'public/' . $avatarImagem;

                if(Storage::exists($oldAvatar))
                {
                    Storage::delete($oldAvatar);
                }
            }
            $user->update([
                'avatar' => $newAvatar
            ]);
        }


        $brandImage = $user->channel->brand;
        $newImage = reset($this->data['channel']['brand']);

        if ($newImage !== $brandImage) {
            if($brandImage != 'default-brand.png'){
                $oldPath = 'public/' . $brandImage;

                if(Storage::exists($oldPath))
                {
                    Storage::delete($oldPath);
                }
            }
            $user->channel->update([
                'brand' => $newImage,
            ]);
        }

        if (!empty($this->data['password'])) {
            $this->getSavedNotification();
            return redirect(route('filament.admin.auth.login'));
        }
    }

    protected function afterSave()
    {
        $user = User::with('channel')->findOrFail($this->data['id']);
        $channel = $user->channel;
        $user->channel->slug = Str::slug($this->data['channel']['link']) . '-' . $this->data['id'];
        $user->channel()->save($channel);
    }

    /**
     * modificar os dados de um registro antes de preenchê-lo no formulário
    */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $data;
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction()->label('Salvar mudanças'),
            $this->getCancelFormAction()->label('Cancelar'),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return parent::getSavedNotification()
            ->title('Usuário editado com sucesso!')
            ->body($this->data['name'] . ' | ' . $this->data['email']);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
