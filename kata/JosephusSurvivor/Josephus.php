<?php

declare(strict_types=1);

namespace Kata\JosephusSurvivor;

final class Josephus
{
    public function survivor(int $n, int $k): int
    {
        $circle = range(0, $n);

        for ($dudesInCircle = ($n+1); $dudesInCircle > 1; $dudesInCircle--) {
            unset($circle[key($circle)]);

            // edge case: kill last one in array, reset before starting to count
            if (current($circle) === false) {
                reset($circle);
            }

            // find next target in circle
            for ($counter = 1; $counter < $k; $counter++) {
                $position = next($circle);
                if ($position === false) {
                   reset($circle);
                }
            }
        }

        return array_pop($circle);
    }
}