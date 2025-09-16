<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPost extends ViewRecord
{
    protected static string $resource = PostResource::class;

    protected static ?string $breadcrumb = 'Visualizar postagem';
    protected static ?string $title = "Visualização";

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = "Visualizar";

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->label('Editar postagem'),
        ];
    }
}
