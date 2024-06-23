<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ReservationResource;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ReservationsDayChart extends LineChartWidget
{
    protected static ?string $pollingInterval = null;

    protected function getHeading(): ?string
    {
        return __('admin.reservations_chart', ['period' => __('admin.day')]);
    }

    protected function getData(): array
    {
        $data = Trend::query(ReservationResource::getEloquentQuery())
            ->between(
                start: now()->startOfDay(),
                end: now()->endOfDay(),
            )
            ->perHour()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => __('admin.reservations'),
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }
}
