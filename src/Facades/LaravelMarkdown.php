<?php

namespace mindtwo\LaravelMarkdown\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mindtwo\LaravelMarkdown\LaravelMarkdown
 */
class LaravelMarkdown extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \mindtwo\LaravelMarkdown\LaravelMarkdown::class;
    }
}
