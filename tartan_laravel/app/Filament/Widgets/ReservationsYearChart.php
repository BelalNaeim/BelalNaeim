<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ReservationResource;
use App\Models\Reservation;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ReservationsYearChart extends LineChartWidget
{
    protected static ?string $pollingInterval = null;

    protected function getHeading(): ?string
    {
        return __('admin.reservations_chart' , ['period' => __('admin.year')]);
    }

    protected function getData(): array
    {
        $data = Trend::query(ReservationResource::getEloquentQuery())
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => __('admin.reservations'),
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }
}
