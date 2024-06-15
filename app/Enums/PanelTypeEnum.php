<?php

declare(strict_types=1);

namespace App\Enums;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PanelTypeEnum: string implements HasLabel, HasColor, HasIcon
{
    case SUPER_ADMIN  =   "super-admin";
    case ADMIN  =   "admin";
    case APP    =   "app";



    public function getLabel(): ?string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'Super Administrador',
            self::ADMIN => 'Administrador',
            self::APP => 'Usuário',
        };
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::SUPER_ADMIN => 'success',
            self::ADMIN => 'success',
            self::APP => 'warning',
        };
    }

    public function getIcon(): ?string
    {
        return match($this)
        {
            self::SUPER_ADMIN => 'heroicon-o-check-badge',
            self::ADMIN => 'heroicon-o-shield-check',
            self::APP   => 'heroicon-o-users',
        };
    }
}
