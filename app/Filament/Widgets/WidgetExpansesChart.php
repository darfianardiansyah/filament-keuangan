<?php
namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;

class WidgetExpansesChart extends ChartWidget
{
    use InteractsWithPageFilters;
    protected static ?string $heading = 'Pengeluaran';
    // protected static string $color    = 'danger';

    protected function getData(): array
    {
        $startDate = ! empty($this->filters['startDate'])
        ? Carbon::parse($this->filters['startDate'])
        : now()->subDays(30);

        $endDate = ! empty($this->filters['endDate'])
        ? Carbon::parse($this->filters['endDate'])
        : now();

        $data = Trend::query(Transaction::expanses())
            ->between(
                start: $startDate,
                end: $endDate,
            )
            ->perDay()
            ->sum('amount');

        return [
            'datasets' => [
                [
                    'label'           => 'Pengeluaran',
                    'data'            => $data->map(fn(TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgb(var(--danger))',
                ],
            ],
            'labels'   => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
