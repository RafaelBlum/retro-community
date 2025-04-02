<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }





    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentView::registerRenderHook(
            PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
            fn(): string => <<<'HTML'
                <div class="flex justify-end gap-1 text-sm">
                    <span class="text-gray-800 dark:text-gray-200">Precisa de ajuda?</span>
                    <a href="/admin/contact" class="text-primary-500">
                            Fale conosco
                    </a>
                </div>
            HTML

        );
    }
}
