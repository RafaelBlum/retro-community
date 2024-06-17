<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Colors\Color;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected static ?string $breadcrumb = 'Lista de postagens';

    protected static ?int $navigationSort = 0;

    protected static ?string $navigationLabel = "Listagem";

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Criar nova postagem')
                ->color(Color::Amber),
        ];
    }
}
