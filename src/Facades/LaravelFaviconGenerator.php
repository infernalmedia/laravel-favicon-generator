<?php

namespace InfernalMedia\LaravelFaviconGenerator\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \InfernalMedia\LaravelFaviconGenerator\LaravelFaviconGenerator
 */
class LaravelFaviconGenerator extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \InfernalMedia\LaravelFaviconGenerator\LaravelFaviconGenerator::class;
    }
}
