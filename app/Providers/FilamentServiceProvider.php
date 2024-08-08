<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Filament::serving(function () {
            Filament::registerNavigationItems([
                NavigationItem::make('Dashboard')
                    ->icon('heroicon-o-home')
                    ->activeIcon('heroicon-s-home')
                    ->isActiveWhen(fn (): bool => request()->routeIs('filament.pages.dashboard'))
                    ->url(route('filament.pages.dashboard')),
            ]);
        });
    }
}