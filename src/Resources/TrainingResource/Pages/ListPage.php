<?php

namespace Moox\Training\Resources\TrainingResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Moox\Training\Models\Training;
use Moox\Training\Resources\TrainingResource;
use Moox\Training\Resources\TrainingResource\Widgets\TrainingWidgets;

class ListPage extends ListRecords
{
    public static string $resource = TrainingResource::class;

    public function getActions(): array
    {
        return [];
    }

    public function getHeaderWidgets(): array
    {
        return [
            TrainingWidgets::class,
        ];
    }

    public function getTitle(): string
    {
        return __('trainings::translations.title');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->using(function (array $data, string $model): Training {
                    return $model::create($data);
                }),
        ];
    }
}
