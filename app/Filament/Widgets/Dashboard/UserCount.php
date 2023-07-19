<?php

namespace App\Filament\Widgets\Dashboard;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class UserCount extends BaseWidget
{
    protected function getCards(): array
    {
        $numberOfAdmin = User::where('isAdmin', '=' ,1)->count();
        $numberOfNormalUser = User::where('isAdmin', '=' , 0)->count();
        return [
        
            Card::make('Users',$numberOfNormalUser)
                ->icon('heroicon-o-user')
                ->description("Total number of normal users in the system"),
            Card::make('Admins',$numberOfAdmin)
                ->icon('heroicon-o-lock-closed')
                ->description("Total number of admins in the system"),

        ];
    }
}
