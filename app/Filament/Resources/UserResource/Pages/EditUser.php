<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
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


class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->action(function(User $record) {
                if($record->panel->value == 'admin'){
                    Notification::make('register_error')
                        ->title('Ação negada!')
                        ->body('Você não tem permisão para para deletar um administrador!')
                        ->danger()
                        ->persistent()
                        ->send();
                    return null;
                }
                $record->delete();
            })
                ->requiresConfirmation()
                ->modalHeading('Deletar ' . $this->data['name'])
                ->modalDescription('Tem certeza de que deseja excluir este ' . $this->data['name'] . '? Isto não pode ser desfeito.')
                ->modalSubmitActionLabel('Sim, deletar!'),
        ];
    }


    protected function beforeSave()
    {
        $user = User::find($this->data['id']);

        $caminhoDaImagem = array_values($this->data['avatar'])[0];

        if ($user->avatar != $caminhoDaImagem) {
            if($user->avatar != 'default.jpg'){
                Storage::delete('public/' . $user->avatar);
            }
        }

        if (!empty($this->data['password'])) {
            $this->getSavedNotification();
            return redirect(route('filament.admin.auth.login'));
        }
    }

    protected function afterSave()
    {

    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make('register_error')
            ->title('Senha alterada!')
            ->body('Você será redirecionado ao Login...')
            ->danger();
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        //modificar os dados de um registro antes de preenchê-lo no formulário
        //se você estiver editando registros em uma ação modal
        return $data;
    }
}
