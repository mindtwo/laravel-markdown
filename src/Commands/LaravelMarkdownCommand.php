<?php

namespace mindtwo\LaravelMarkdown\Commands;

use Illuminate\Console\Command;

class LaravelMarkdownCommand extends Command
{
    public $signature = 'laravel-markdown';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
