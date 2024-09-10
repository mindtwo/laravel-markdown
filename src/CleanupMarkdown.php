<?php

namespace mindtwo\LaravelMarkdown;

use mindtwo\LaravelMarkdown\Actions\AdjustHeadlineLevelAction;
use mindtwo\LaravelMarkdown\Actions\RemoveBoldFromHeadlinesAction;

class CleanupMarkdown
{
    public function execute(?string $markdown, int $maxHeadlineLevel = 1): ?string
    {
        if (! $markdown) {
            return null;
        }

        $markdown = (new RemoveBoldFromHeadlinesAction)($markdown);
        $markdown = (new AdjustHeadlineLevelAction)($markdown, $maxHeadlineLevel);

        return $markdown;
    }
}
