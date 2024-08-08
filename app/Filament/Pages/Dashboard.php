<?php

namespace App\Filament\Pages;

// use Filament\Pages\Page;
use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\StatsOverview;



class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    protected static ?string $title = 'Dashboard';


    protected function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
