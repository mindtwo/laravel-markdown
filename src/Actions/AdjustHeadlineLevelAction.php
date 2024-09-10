<?php

namespace mindtwo\LaravelMarkdown\Actions;

class AdjustHeadlineLevelAction
{
    /**
     * Adjust the headline levels in the markdown content relative to the max level.
     */
    public function __invoke(?string $markdown, int $maxLevel = 1): ?string
    {
        if (! $markdown) {
            return null;
        }

        // Get the maximum headline level detected in the content
        $currentMaxLevel = $this->detectMaxHeadlineLevel($markdown);

        // If we have a current max headline level, and it's different, adjust the levels
        if ($currentMaxLevel > 0) {
            $markdown = $this->adjustHeadlines($markdown, $maxLevel, $currentMaxLevel);
        }

        return $markdown;
    }

    /**
     * Detect the maximum headline level (H1, H2, etc.) present in the markdown content.
     */
    protected function detectMaxHeadlineLevel(string $markdown): int
    {
        for ($level = 1; $level <= 6; $level++) {
            if (preg_match('/^'.str_repeat('#', $level).' +.+$/m', $markdown)) {
                return $level;
            }
        }

        return 0; // No headlines found
    }

    /**
     * Adjust headlines in the markdown content based on the detected max headline level.
     */
    protected function adjustHeadlines(string $markdown, int $maxLevel, int $currentMaxLevel): string
    {
        $shiftAmount = $maxLevel - $currentMaxLevel;

        // Adjust each headline based on the shift amount
        for ($level = $currentMaxLevel; $level >= 1; $level--) {
            $oldHeading = str_repeat('#', $level).' ';
            $newHeading = str_repeat('#', $level + $shiftAmount).' ';
            $markdown = str_replace($oldHeading, $newHeading, $markdown);
        }

        return $markdown;
    }
}
