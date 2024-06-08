<?php

namespace Moox\Training\Resources\TrainingInvitationResource\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Moox\Training\Jobs\SendInvitationRequests;
use Moox\Training\Resources\TrainingInvitationResource;
use Moox\Training\Traits\HasDescendingOrder;

class ListTrainingInvitations extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = TrainingInvitationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('requestInvitations')
                ->label('Request Invitations')
                ->action(function () {
                    SendInvitationRequests::dispatch();
                })
                ->requiresConfirmation()
                ->color('primary'),
        ];
    }
}
