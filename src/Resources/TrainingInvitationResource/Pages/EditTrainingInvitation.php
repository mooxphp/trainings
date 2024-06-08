<?php

namespace Moox\Training\Resources\TrainingInvitationResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Moox\Training\Resources\TrainingInvitationResource;

class EditTrainingInvitation extends EditRecord
{
    protected static string $resource = TrainingInvitationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('sendInvitation')
                ->label('Send Invitation')
                ->action(function () {
                    // Send invitation job
                }),
            DeleteAction::make(),
        ];
    }
}
