<?php

namespace App\Filament\Resources\Users\Pages;

use App\Enums\PanelTypeEnum;
use App\Filament\Resources\Users\UserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $tabs = [
            'all' => Tab::make('Todos')
                ->badge(fn() => static::getResource()::getEloquentQuery()->count()),
        ];

        // Adiciona a aba Seguidores apenas se for Super Admin
        if (auth()->user()->panel === \App\Enums\PanelTypeEnum::SUPER_ADMIN) {
            $tabs['seguidores'] = Tab::make('Seguidores (APP)')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('panel', \App\Enums\PanelTypeEnum::APP))
                ->icon('heroicon-m-user-group')
                ->badge(fn() => static::getResource()::getEloquentQuery()->where('panel', \App\Enums\PanelTypeEnum::APP)->count());
        }

        $tabs['admins'] = Tab::make('Administradores')
            ->modifyQueryUsing(fn (Builder $query) => $query->where('panel', \App\Enums\PanelTypeEnum::ADMIN))
            ->icon('heroicon-m-shield-check');

        return $tabs;


//        return [
//            'all' => Tab::make('Todos os Usuários')
//                ->badge(fn() => $this->getModel()::query()->where('panel', '!=', PanelTypeEnum::SUPER_ADMIN)->count()),
//
//            'streamers' => Tab::make('Streamers')
//                ->modifyQueryUsing(fn (Builder $query) => $query->where('panel', PanelTypeEnum::APP))
//                ->icon('heroicon-m-video-camera')
//                ->badge(fn() => $this->getModel()::query()->where('panel', PanelTypeEnum::APP)->count())
//                ->badgeColor('success'),
//
//            'admins' => Tab::make('Administradores')
//                ->modifyQueryUsing(fn (Builder $query) => $query->where('panel', PanelTypeEnum::ADMIN))
//                ->icon('heroicon-m-shield-check')
//                ->badge(fn() => $this->getModel()::query()->where('panel', PanelTypeEnum::ADMIN)->count())
//                ->badgeColor('warning'),
//        ];
    }
}
