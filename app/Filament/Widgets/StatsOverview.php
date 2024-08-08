<?php

namespace App\Filament\Widgets;

use App\Models\RiskAssessment;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static string $view = 'filament.widgets.stats-overview';

    protected function getCards(): array
    {
        return [
            Card::make('Total Users', User::count())
                ->description('Total number of registered users')
                ->descriptionIcon('heroicon-s-user-group'),
            Card::make('Users with Risk Assessment', RiskAssessment::distinct('user_id')->count())
                ->description('Users who have taken the risk assessment')
                ->descriptionIcon('heroicon-s-clipboard-check'),
        ];
    }
}
