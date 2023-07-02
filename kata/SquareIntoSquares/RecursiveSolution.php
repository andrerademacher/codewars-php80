<?php

declare(strict_types=1);

namespace Kata\SquareIntoSquares;

final class RecursiveSolution
{
    public function decompose(int $n): ?array
    {
        if ($n < 5) {
            return null;
        }

        $solution = $this->solve($n, $n, []);
        return is_array($solution)
            ? array_reverse($solution)
            : null;
    }

    private function solve(int $n, int $k, array $stack): ?array
    {
        // solution found!
        $stackSum = $this->squareSum($stack);

        for ($highest = $k - 1; $highest > 0; $highest--) {

            // don't overshoot
            if ($stackSum + ($highest ** 2) > ($n ** 2)) {
                continue;
            }

            // solution found
            if ($stackSum + $highest ** 2 == $n ** 2) {
                return [...$stack, $highest];
            }

            // try with next fitting lower number
            $result = $this->solve($n, $highest, [...$stack, $highest]);
            if ($result != null) {
                return $result;
            }
        }

        return null;
    }

    private function squareSum(array $stack): int
    {
        $sum = 0;
        foreach ($stack as $element) {
            $sum += $element ** 2;
        }

        return $sum;
    }
}