<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use App\Models\Category;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;
    protected static ?string $breadcrumb = 'Edição de categoria';
    protected static ?string $title = "Editar";

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = "Editar categoria";

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Deletar categoria')
                ->action(function(Category $record) {
                $record->delete();
            })
                ->requiresConfirmation()
                ->modalHeading('Deletar Categoria')
                ->modalDescription('Tem certeza de que deseja excluir esta categoria? Isto não pode ser desfeito.')
                ->modalSubmitActionLabel('Sim, deletar!'),
        ];
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
            ->title('Categoria editada com sucesso!')
            ->body($this->data['name']);
    }

    protected function afterSave()
    {
        $category = Category::find($this->data['id']);
        $category->slug = Str::slug($this->data['name'] . '-' . $this->data['id']);
        $category->save();
    }
}
