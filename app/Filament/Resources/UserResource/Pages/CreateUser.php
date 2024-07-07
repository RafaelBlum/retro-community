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

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        //dd($data, $this->data);

        $data['slug'] = Str::slug($this->data['channel']['link']);
        dd($data, $this->data);
        return $data;
    }

//    protected function beforeSave()
//    {
//        $data['slug'] = Str::slug($this->data['channel']['link']);
//        dd($data['slug'], $this->data['channel']['link']);
//    }

    protected function getCreatedNotification(): ?Notification
    {
        return parent::getCreatedNotification()
            ->title('Usuário criado com sucesso!')
            ->body($this->data['name'] . ' | ' . $this->data['email']);
    }

}
