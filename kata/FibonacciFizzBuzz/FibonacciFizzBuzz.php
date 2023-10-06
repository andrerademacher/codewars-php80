<?php

declare(strict_types=1);

namespace Kata\FibonacciFizzBuzz;

final class FibonacciFizzBuzz
{
    public function fizzBuzz(int $n): array
    {
        $result = [0, 1];
        for ($round = 0; $round < ($n - 1); $round++) {
            $result[] = array_sum(array_slice($result, -2));
        }

        // this kata starts with index 1
        array_shift($result);

        foreach ($result as $key => $value) {
            if ($value % 15 == 0) {
                $result[$key] ='FizzBuzz';
                continue;
            }

            if ($value % 5 == 0) {
                $result[$key] ='Buzz';
                continue;
            }

            if ($value % 3 == 0) {
                $result[$key] ='Fizz';
            }
        }

        return $result;
    }
}