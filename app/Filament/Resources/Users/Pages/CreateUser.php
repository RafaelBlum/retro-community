<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected static ?string $breadcrumb = 'Criar usuário';
    protected static ?string $title = "Criação";

    protected function beforeCreate(): void
    {

        $verifyEmailUser = User::where('email', $this->data['email'])->first();



        if ($verifyEmailUser && ($verifyEmailUser->email === $this->data['email'])) {
            Notification::make('register_error')
                ->title('Cadastro invalido!')
                ->body('Seu E-mail já foi registrado!')
                ->danger()
                ->persistent()
                ->send();

            $this->halt();
        }
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSubmitFormAction()->label('Criar e salva'),
            $this->getCreateAnotherFormAction()->label('Salva e criar outro'),
            $this->getCancelFormAction()->label('Cancelar')

        ];
    }

    protected function getCreatedNotification(): ?Notification
    {
        return parent::getCreatedNotification()
            ->title('Usuário criado com sucesso!')
            ->body($this->data['name'] . ' | ' . $this->data['email']);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
