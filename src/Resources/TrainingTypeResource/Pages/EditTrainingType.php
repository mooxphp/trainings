<?php

namespace Moox\Training\Resources\TrainingTypeResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Moox\Training\Resources\TrainingTypeResource;

class EditTrainingType extends EditRecord
{
    protected static string $resource = TrainingTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
