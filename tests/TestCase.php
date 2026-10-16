<?php

namespace InfernalMedia\LaravelFaviconGenerator\Tests;

use InfernalMedia\LaravelFaviconGenerator\LaravelFaviconGeneratorServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelFaviconGeneratorServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
    }
}
