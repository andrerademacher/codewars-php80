<?php

declare(strict_types=1);

namespace Kata\NextHigherNumberBits;

final class NextHigherNumberBits
{
    public function nextHigher(int $number): int
    {
        $getNumberOfOnes = static fn(int $number) => strlen(strtr(decbin($number), ['0' => '']));
        $numberOfOnes = $getNumberOfOnes($number);
        for ($nextHigher = $number + 1; $getNumberOfOnes($nextHigher) !== $numberOfOnes; $nextHigher++) {}
        return $nextHigher;
    }
}