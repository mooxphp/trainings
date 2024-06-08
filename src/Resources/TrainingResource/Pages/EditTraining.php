<?php

namespace Moox\Training\Resources\TrainingResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Moox\Training\Resources\TrainingResource;

class EditTraining extends EditRecord
{
    protected static string $resource = TrainingResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
