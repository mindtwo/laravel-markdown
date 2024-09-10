<?php

namespace mindtwo\LaravelMarkdown\Tests\Feature;

use mindtwo\LaravelMarkdown\Actions\AdjustHeadlineLevelAction;

it('returns null when markdown is null', function () {
    $adjustHeadline = new AdjustHeadlineLevelAction;
    expect($adjustHeadline(null, 2))->toBeNull();
});

it('adjusts headline levels based on max level', function () {
    $markdown = "# Heading\n## Subheading\n### Third level";
    $adjustHeadline = new AdjustHeadlineLevelAction;

    $adjusted = $adjustHeadline($markdown, 2);

    expect($adjusted)
        ->toContain('## Heading')
        ->toContain('### Subheading')
        ->toContain('#### Third level');
});

it('does not adjust levels if max level is already reached', function () {
    $markdown = "## Heading\n### Subheading\n#### Third level";
    $adjustHeadline = new AdjustHeadlineLevelAction;

    $adjusted = $adjustHeadline($markdown, 3);

    expect($adjusted)
        ->toContain('## Heading')
        ->toContain('### Subheading')
        ->toContain('#### Third level');
});
