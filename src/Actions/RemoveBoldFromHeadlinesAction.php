<?php

namespace mindtwo\LaravelMarkdown\Actions;

class RemoveBoldFromHeadlinesAction
{
    public function __invoke(?string $markdown): ?string
    {
        if (! $markdown) {
            return null;
        }

        // Use the 's' modifier to allow '.' to match newline characters
        // Ensure lazy matching of bold content to prevent over-capture
        return preg_replace('/(#+\s+(\d+\.\s+)?)(\*\*)(.+?)(\*\*)/s', '$1$4', $markdown);
    }
}
