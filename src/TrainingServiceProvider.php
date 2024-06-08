<?php

declare(strict_types=1);

namespace Moox\Training;

use Moox\Training\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TrainingServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('trainings')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations()
            ->hasMigrations(['create_trainings_table'])
            ->hasCommand(InstallCommand::class);
    }
}
