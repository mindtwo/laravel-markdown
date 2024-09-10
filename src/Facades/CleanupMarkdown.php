<?php

namespace mindtwo\LaravelMarkdown\Facades;

use Illuminate\Support\Facades\Facade;
use mindtwo\LaravelMarkdown\CleanupMarkdown as CleanupMarkdownBase;

/**
 * @see CleanupMarkdown
 */
class CleanupMarkdown extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CleanupMarkdownBase::class;
    }
}
