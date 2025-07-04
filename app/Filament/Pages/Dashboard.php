<?php
namespace App\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Support\Carbon;

class Dashboard extends BaseDashboard
{
    use BaseDashboard\Concerns\HasFiltersForm;

    public function filtersForm(Form $form): Form
    {
    return $form
        ->schema([
            Section::make()
                ->schema([
                    DatePicker::make('startDate')
                        ->default(fn() => Carbon::now()->startOfMonth())
                        ->maxDate(fn(Get $get) => $get('endDate') ?: now()),

                    DatePicker::make('endDate')
                        ->default(fn() => Carbon::now()->endOfMonth())
                        ->minDate(fn(Get $get) => $get('startDate') ?: now()),
                        // ->maxDate(now()),
                ])
                ->columns(2),
        ]);
    }
}
