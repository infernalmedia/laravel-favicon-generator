<?php

namespace InfernalMedia\LaravelFaviconGenerator;

use Illuminate\Support\Facades\Blade;
use InfernalMedia\LaravelFaviconGenerator\Commands\LaravelFaviconGeneratorCommand;
use InfernalMedia\LaravelFaviconGenerator\View\Components\FaviconMeta;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelFaviconGeneratorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-favicon-generator')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(LaravelFaviconGeneratorCommand::class);
    }

    public function packageRegistered(): void
    {
        $this->app->singleton(LaravelFaviconGenerator::class);
    }

    public function packageBooted(): void
    {
        Blade::component('favicon-meta', FaviconMeta::class);
    }
}
