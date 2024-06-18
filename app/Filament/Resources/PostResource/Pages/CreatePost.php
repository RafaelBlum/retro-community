<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Post;
use Filament\Actions;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected static ?string $breadcrumb = 'Criar postagem';
    protected static ?string $title = "Criação";

    public function getSubNavigation(): array
    {
        if (filled($cluster = static::getCluster())) {
            return $this->generateNavigationItems($cluster::getClusteredComponents());
        }

        return [];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if($this->data['status'] == 'PUBLISHED'){
            $data['published_at'] = date('Y-m-d H:i:s');
        }elseif ($this->data['status'] == 'SCHEDULED'){
            $data['scheduled_for'] = date('Y-m-d H:i:s', strtotime($this->data['scheduled_for']));
        }

        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($data['title']);
        return $data;
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
            ->title('Postagem criada com sucesso!')
            ->body($this->data['title']);
    }

}
