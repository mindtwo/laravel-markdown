<?php

namespace mindtwo\LaravelMarkdown\Tests\Feature;

use mindtwo\LaravelMarkdown\Facades\CleanupMarkdown;

it('uses the facade to execute markdown cleanup', function () {
    $markdown = "# **Bold Heading**\n## **Subheading**";
    $result = CleanupMarkdown::execute($markdown, 2);

    expect($result)
        ->toContain('## Bold Heading')
        ->not()->toContain('**');
});
