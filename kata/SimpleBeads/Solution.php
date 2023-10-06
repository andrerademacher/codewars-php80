<?php

declare(strict_types=1);

namespace Kata\SimpleBeads;

final class Solution
{
    public function countRedBeads(int $n): int
    {
        return ($n < 2)
            ? 0
            : ($n * 2) - 2;
    }
}