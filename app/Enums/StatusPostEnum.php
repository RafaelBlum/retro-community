<?php


namespace App\Enums;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum StatusPostEnum: string implements HasLabel, HasColor, HasIcon
{
    case DRAFT = 'DRAFT';
    case PUBLISHED = 'PUBLISHED';
    case PENDING_REVIEW = 'PENDING_REVIEW';
    case SCHEDULED = 'SCHEDULED';
    case PRIVATE = 'PRIVATE';

    public function getLabel(): string
    {
        return match ($this)
        {
            self::DRAFT => 'Rascunho',
            self::PUBLISHED => 'Publicar',
            self::PENDING_REVIEW => 'Pendente para analise',
            self::SCHEDULED => 'Programado',
            self::PRIVATE => 'Privado',
        };
    }

    public function getColor(): string | array | null
    {
           return match ($this)
           {
                self::DRAFT => 'warning',
                self::PUBLISHED => 'success',
                self::PENDING_REVIEW => 'warning',
                self::SCHEDULED => 'warning',
                self::PRIVATE => 'danger',
           };
    }

    public function getIcon(): ?string
    {
        return match($this)
        {
            self::DRAFT => 'heroicon-o-bell-alert',
            self::PUBLISHED => 'heroicon-o-bell-alert',
            self::PENDING_REVIEW => 'heroicon-o-bell-alert',
            self::SCHEDULED => 'heroicon-o-bell-alert',
            self::PRIVATE => 'heroicon-o-bell-alert',
        };
    }
}
