<?php

namespace Moox\Training\Resources\TrainingResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use Moox\Training\Models\Training;

class TrainingWidgets extends BaseWidget
{
    protected function getCards(): array
    {
        $aggregationColumns = [
            DB::raw('COUNT(*) as count'),
            DB::raw('COUNT(*) as count'),
            DB::raw('COUNT(*) as count'),
        ];

        $aggregatedInfo = Training::query()
            ->select($aggregationColumns)
            ->first();

        return [
            Stat::make(__('trainings::translations.totalone'), $aggregatedInfo->count ?? 0),
            Stat::make(__('trainings::translations.totaltwo'), $aggregatedInfo->count ?? 0),
            Stat::make(__('trainings::translations.totalthree'), $aggregatedInfo->count ?? 0),
        ];
    }
}
