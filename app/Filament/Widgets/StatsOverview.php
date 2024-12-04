<?php

namespace App\Filament\Widgets;

use App\Models\Reservation;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 2;

    protected static ?string $pollingInterval = '15s';

    protected static bool $isLazy = true;

    protected function getStats(): array
    {
        return [
            Stat::make('Total de Reservas', Reservation::count())
                ->description('Aumento de Reservas')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),
            Stat::make('Reservas Pendentes', Reservation::where('status', 'Pending')->count())
                ->description('Aumento de Reservas Pendentes')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),
            Stat::make('Clientes', $this->getClientCount())
                ->description('Aumento de Clientes')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),
        ];


    }

    private function getClientCount(): int
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'client'); // Nome do papel no banco de dados
        })->count();
    }
}
