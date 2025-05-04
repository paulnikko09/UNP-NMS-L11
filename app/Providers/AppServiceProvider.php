<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Panel;
use Filament\PanelProvider;
use Saade\FilamentLaravelLog\FilamentLaravelLogPlugin;

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
     * Register any application Panel.
     */
	public function panel(Panel $panel): Panel
	{
    return $panel
        // ... other configurations
        ->plugin(
            FilamentLaravelLogPlugin::make()
                ->navigationGroup('System Tools')
                ->navigationLabel('Logs')
                ->navigationIcon('heroicon-o-bug-ant')
                ->navigationSort(1)
                ->slug('logs')
        );
}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
