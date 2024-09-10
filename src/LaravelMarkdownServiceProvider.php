<?php

namespace mindtwo\LaravelMarkdown;

use Mindtwo\LaravelMarkdown\Commands\LaravelMarkdownCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelMarkdownServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-markdown')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_markdown_table')
            ->hasCommand(LaravelMarkdownCommand::class);
    }
}
