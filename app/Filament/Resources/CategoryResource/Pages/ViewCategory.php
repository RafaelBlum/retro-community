<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCategory extends ViewRecord
{
    protected static string $resource = CategoryResource::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = "Visualizar";

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->label('Editar categoria'),
        ];
    }
}
