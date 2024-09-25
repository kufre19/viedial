<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\RiskAssessment;
use App\Models\MealBuilt;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Registered Users', User::count())
                ->description('Total number of users registered')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),
            
            Stat::make('Verified Users', User::whereNotNull('email_verified_at')->count())
                ->description('Users with verified email addresses')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success'),
            
            Stat::make('Users with Assessments', RiskAssessment::distinct('user_id')->count())
                ->description('Users who have taken assessments')
                ->descriptionIcon('heroicon-m-clipboard-document-check')
                ->color('warning'),
            
            Stat::make('Total Meals Built', MealBuilt::count())
                ->description('Number of meals created by users')
                ->descriptionIcon('heroicon-m-cake')
                ->color('danger'),
        ];
    }
}