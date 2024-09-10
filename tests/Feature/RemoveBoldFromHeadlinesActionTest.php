<?php

namespace mindtwo\LaravelMarkdown\Tests\Feature;

use mindtwo\LaravelMarkdown\Actions\RemoveBoldFromHeadlinesAction;

it('returns null when markdown is null', function () {
    $removeBold = new RemoveBoldFromHeadlinesAction;
    expect($removeBold(null))->toBeNull();
});

it('removes bold from headlines', function () {
    $markdown = "# **Bold Heading**\nSome text.";
    $removeBold = new RemoveBoldFromHeadlinesAction;

    $cleaned = $removeBold($markdown);

    expect($cleaned)
        ->not()->toContain('**')
        ->toContain('# Bold Heading');
});

it('does not remove bold from regular text', function () {
    $markdown = "# Heading\nSome **bold** text.";
    $removeBold = new RemoveBoldFromHeadlinesAction;

    $cleaned = $removeBold($markdown);

    expect($cleaned)
        ->toContain('**bold**')
        ->toContain('# Heading');
});
