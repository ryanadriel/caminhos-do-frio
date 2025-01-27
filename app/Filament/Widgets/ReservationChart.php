<?php

namespace App\Filament\Widgets;

use App\Models\Reservation;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class ReservationChart extends ChartWidget
{
    protected static ?string $heading = 'Gráfico Reservas Solicitadas';

    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $data = $this->getReservationPerMonth();

        return [
            'datasets' => [
                [
                    'label' => 'Reservas Solicitadas',
                    'data' => $data['reservationPerMonth']
                ]
            ],
            'labels' => $data['months']
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    private  function  getReservationPerMonth(): array
    {
        $now = Carbon::now();
        $reservationPerMonth = [];
        $months = [];

        for ($i = 1; $i <= 12; $i++) {
            $startOfMonth = $now->copy()->month($i)->startOfMonth();
            $endOfMonth = $now->copy()->month($i)->endOfMonth();

            $count = Reservation::whereBetween('reservation_date', [$startOfMonth, $endOfMonth])->count();

            $reservationPerMonth[] = $count;
            $months[] = $startOfMonth->format('M');
        }

        return [
            'reservationPerMonth' => $reservationPerMonth,
            'months' => $months,
        ];
    }
}
