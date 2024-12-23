<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;


    protected static ?string $breadcrumb = 'Criar usuário';
    protected static ?string $title = "Criação";

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

    protected function beforeFill(): void
    {
        //dd("1 Runs before the form fields are populated from the database.");
    }

    protected function afterFill(): void
    {
        //dd("2 Runs after the form fields are populated from the database.");
    }

    protected function beforeValidate(): void
    {
        //dd($this->data, $this->data['channel']['slug']);
        //dd("3 Runs before the form fields are validated when the form is saved.");
    }

    protected function afterValidate(): void
    {
        //dd("4 Runs after the form fields are validated when the form is saved.");
    }

    protected function beforeSave(): void
    {
        dd($this->data, $this->data['channel']['slug']);
        //dd("5 Runs before the form fields are saved to the database.");
    }

    protected function afterSave(): void
    {
        dd("6 Runs after the form fields are saved to the database.");
    }

}
