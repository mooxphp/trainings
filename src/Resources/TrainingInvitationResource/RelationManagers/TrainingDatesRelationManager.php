<?php

namespace Moox\Training\Resources\TrainingInvitationResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class TrainingDatesRelationManager extends RelationManager
{
    protected static string $relationship = 'trainingDates';

    protected static ?string $recordTitleAttribute = 'link';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([
                DateTimePicker::make('begin')
                    ->rules(['date'])
                    ->placeholder('Begin')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                DateTimePicker::make('end')
                    ->rules(['date'])
                    ->placeholder('End')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('type')
                    ->rules(['in:onsite,teams,webex,slack,zoom'])
                    ->searchable()
                    ->options([
                        'Onsite' => 'Onsite',
                        'Teams' => 'Teams',
                        'Webex' => 'Webex',
                        'Slack' => 'Slack',
                        'Zoom' => 'Zoom',
                    ])
                    ->placeholder('Type')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('link')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Link')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('location')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Location')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('min_participants')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Min Participants')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('max_participants')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Max Participants')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(
                    'trainingInvitation.title'
                )->limit(50),
                Tables\Columns\TextColumn::make('begin')->dateTime(),
                Tables\Columns\TextColumn::make('end')->dateTime(),
                Tables\Columns\TextColumn::make('type')->enum([
                    'Onsite' => 'Onsite',
                    'Teams' => 'Teams',
                    'Webex' => 'Webex',
                    'Slack' => 'Slack',
                    'Zoom' => 'Zoom',
                ]),
                Tables\Columns\TextColumn::make('link')->limit(50),
                Tables\Columns\TextColumn::make('location')->limit(50),
                Tables\Columns\TextColumn::make('min_participants'),
                Tables\Columns\TextColumn::make('max_participants'),
            ])
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '>=',
                                    $date
                                )
                            )
                            ->when(
                                $data['created_until'],
                                fn (
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '<=',
                                    $date
                                )
                            );
                    }),

                SelectFilter::make('training_invitation_id')
                    ->multiple()
                    ->relationship('trainingInvitation', 'title'),
            ])
            ->headerActions([CreateAction::make()])
            ->actions([EditAction::make(), DeleteAction::make()])
            ->bulkActions([DeleteBulkAction::make()]);
    }
}
