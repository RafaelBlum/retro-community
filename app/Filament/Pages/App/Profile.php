<?php

namespace App\Filament\Pages\App;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Profile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.app.profile';
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = 'Perfil de usuário';

    protected function getViewData(): array
    {
        return [
            'user' => Auth::user(),
        ];
    }
}
