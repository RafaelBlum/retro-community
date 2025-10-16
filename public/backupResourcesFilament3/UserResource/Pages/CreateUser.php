<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected static ?string $breadcrumb = 'Criar usuário';
    protected static ?string $title = "Criar novo usuário";

    protected function getFormActions(): array
    {
        return [
            $this->getSubmitFormAction()
                ->label('Criar e salvar')
                ->icon('heroicon-o-check'),

            $this->getCreateAnotherFormAction()
                ->label('Salvar e criar outro')
                ->icon('heroicon-o-plus'),

            $this->getCancelFormAction()
                ->label('Cancelar')
                ->color('gray')
                ->icon('heroicon-o-x-mark'),
        ];
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Usuário criado com sucesso!')
            ->body("{$this->data['name']} ({$this->data['email']}) foi adicionado.")
            ->send();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterSave(): void
    {
        activity('user')
            ->performedOn($this->record)
            ->causedBy(auth()->user())
            ->log("Novo usuário criado: {$this->record->name}");
    }

}
