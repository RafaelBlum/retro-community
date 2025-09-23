<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Colors\Color;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected static ?string $breadcrumb = 'Lista de categorias';

    protected static ?string $navigationLabel = "Listagem";

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Criar nova categoria')
                ->color(Color::Amber),
        ];
    }
}
