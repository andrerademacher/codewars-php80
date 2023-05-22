<?php

declare(strict_types=1);

namespace Kata\TheFeastOfManyBeasts;

/**
 * Each beast is allowed to bring one dish.
 * The rule is: The dish must start and end with the same letters as the animal's name.
 */
final class Feast
{
    /**
     * Returns true in case the beast is allowed to bring the dish to the feast, else false.
     * $beast and $dish are always lowercase strings with at least 2 letters and no numerals.
     */
    public function feast(string $beast, string $dish): bool
    {
        // non utf8 variant would be:
        // return ($beast[0] === $dish[0]) && ($beast[-1] === $dish[-1]);

        return (mb_substr($beast, 0, 1) === mb_substr($dish, 0, 1))
            && (mb_substr($beast, -1) === mb_substr($dish, -1));
    }
}