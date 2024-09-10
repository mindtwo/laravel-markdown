<?php

namespace mindtwo\LaravelMarkdown\Tests\Feature;

use mindtwo\LaravelMarkdown\CleanupMarkdown;

it('returns null when markdown is null', function () {
    $cleanup = new CleanupMarkdown;
    expect($cleanup->execute(null))->toBeNull();
});

it('removes bold from headlines and adjusts headline levels', function () {
    $markdown = "# **Heading**\n## **Subheading**\nSome text.";
    $cleanup = new CleanupMarkdown;

    $cleaned = $cleanup->execute($markdown, 2);

    expect($cleaned)
        ->not()->toContain('**')
        ->toContain('# Heading')
        ->toContain('## Subheading');
});

it('adjusts headline levels based on max level', function () {
    $markdown = "# Heading\n## Subheading\n### Third level";
    $cleanup = new CleanupMarkdown;

    $cleaned = $cleanup->execute($markdown, 2);

    expect($cleaned)->toContain('## Heading')
        ->toContain('### Subheading')
        ->toContain('#### Third level');
});
