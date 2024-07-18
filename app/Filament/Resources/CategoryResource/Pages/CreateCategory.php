<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Models\Category;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected static ?string $breadcrumb = 'Criar categoria';
    protected static ?string $title = "Criação";

    public function getSubNavigation(): array
    {
        if (filled($cluster = static::getCluster())) {
            return $this->generateNavigationItems($cluster::getClusteredComponents());
        }

        return [];
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
            ->title('Categoria criada com sucesso!')
            ->body($this->data['name']);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $categories = Category::all()->count();

        $data['slug'] = Str::slug($data['name'] . '-' . $categories + 1);
        return $data;
    }
}
