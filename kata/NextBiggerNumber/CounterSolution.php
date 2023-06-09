<?php

declare(strict_types=1);

namespace Kata\NextBiggerNumber;

final class CounterSolution
{
    public function nextBigger(int $n): int
    {
        if ($n < 10) {
            return -1;
        }

        $characters = str_split((string)$n, 1);
        rsort($characters);
        $greatestPossible = (int)implode('', $characters);

        if ($n >= $greatestPossible) {
            return -1;
        }

        $digits = $this->calculateDigits($n);
        $nextBigger = $n + 1;
        while (!($this->calculateDigits($nextBigger) === $digits)) {
            $nextBigger++;
        }

        return $nextBigger;
    }

    private function calculateDigits(int $input): array
    {
        $inputAsString = (string)$input;
        $digitsAmount = array_fill(0, 10, 0);
        for ($a = 0; $a < strlen($inputAsString); $a++) {
            $character = $inputAsString[$a];
            $digitsAmount[$character]++;
        }

        return $digitsAmount;
    }
}