<?php

namespace mindtwo\LaravelMarkdown\Actions;

class RemoveBoldFromHeadlinesAction
{
    public function __invoke(?string $markdown): ?string
    {
        if (! $markdown) {
            return null;
        }

        return preg_replace('/(#+\s+(\d+\.\s+)?)(\*\*)([^*]+)(\*\*)/', '$1$4', $markdown);
    }
}
