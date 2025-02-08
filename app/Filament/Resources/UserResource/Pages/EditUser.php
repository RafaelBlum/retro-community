<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Channel;
use App\Models\User;
use Filament\Actions;
use Filament\Actions\RestoreAction;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Http\Client\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
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
            Actions\DeleteAction::make()
                ->label('Deletar usuário')
                ->action(function(User $record) {
                    if($record->avatar !== 'default.jpg'){
                        Storage::delete('public/' . $record->avatar);
                    }
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
        $user = User::with('channel.camping')->find($this->data['id']);

        if (!$user) {
            abort(404, 'Usuário não encontrado');
        }

        $user->channel->slug = $this->data['channel']['slug'];

        $brandImagem = $user->channel->brand;

        $avatarImagem = $user->avatar;

        if ($user->avatar != $avatarImagem) {
            if($user->avatar != 'default.jpg'){
                Storage::delete('public/' . $avatarImagem);
            }
        }

        if ($user->channel->brand != $brandImagem) {
            if($user->channel->brand != 'default-brand.png'){
                Storage::delete('public/' . $brandImagem);
            }
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

    protected function mutateFormDataBeforeFill(array $data): array
    {
        //modificar os dados de um registro antes de preenchê-lo no formulário
        //se você estiver editando registros em uma ação modal
        //dd($data);
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
}
