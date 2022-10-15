<?php

namespace Nineafrica\OnfonSms;

use Nineafrica\OnfonSms\Commands\OnfonSmsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class OnfonSmsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('onfon-sms')
            ->hasConfigFile()
            // ->hasViews()
            // ->hasMigration('create_onfon-sms_table')
            ->hasCommand(OnfonSmsCommand::class);
    }
}
