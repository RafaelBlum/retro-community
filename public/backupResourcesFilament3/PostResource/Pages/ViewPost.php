<?php

namespace App\Filament\Resources\PostResource\Pages;

use Filament\Actions\EditAction;
use App\Filament\Resources\PostResource;
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
            EditAction::make()
                ->label('Editar postagem'),
        ];
    }
}
