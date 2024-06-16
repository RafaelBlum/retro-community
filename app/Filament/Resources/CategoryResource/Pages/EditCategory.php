<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Models\Category;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = "Editar categoria";

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()->action(function(Category $record) {
                $record->delete();
            })
                ->requiresConfirmation()
                ->modalHeading('Deletar Categoria')
                ->modalDescription('Tem certeza de que deseja excluir esta categoria? Isto não pode ser desfeito.')
                ->modalSubmitActionLabel('Sim, deletar!'),
        ];
    }
}
