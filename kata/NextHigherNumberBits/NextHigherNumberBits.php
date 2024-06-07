<?php

declare(strict_types=1);

namespace Kata\NextHigherNumberBits;

final class NextHigherNumberBits
{
    public function nextHigher(int $number): int
    {
        $getNumberOfOnes = static fn(int $number) => strlen(strtr(decbin($number), ['0' => '']));
        for ($numberOfOnes = $getNumberOfOnes($number); $getNumberOfOnes(++$number) !== $numberOfOnes; ) {}
        return $number;
    }
}