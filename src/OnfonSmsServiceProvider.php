<?php

namespace Apxcde\OnfonSms;

use Apxcde\OnfonSms\Commands\OnfonSmsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class OnfonSmsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('onfon-sms')
            ->hasConfigFile()
            ->hasCommand(OnfonSmsCommand::class);
    }
}
