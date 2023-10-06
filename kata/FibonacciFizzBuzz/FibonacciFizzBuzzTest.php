<?php

declare(strict_types=1);

namespace Kata\FibonacciFizzBuzz;

use Generator;
use PHPUnit\Framework\TestCase;

final class FibonacciFizzBuzzTest extends TestCase
{
    /**
     * @dataProvider provideFibonacciFizzBuzz
     */
    public function testFibonacciFizzBuzz(array $expected, int $n): void
    {
        $fizzBuzzer = new FibonacciFizzBuzz();
        self::assertSame($expected, $fizzBuzzer->fizzBuzz($n));
    }

    public function provideFibonacciFizzBuzz(): Generator
    {
        yield '1' => [
            [1],
            1,
        ];

        yield '2' => [
            [1, 1],
            2,
        ];

        yield '3' => [
            [1, 1, 2],
            3,
        ];

        yield '4' => [
            [1, 1, 2, 'Fizz'],
            4,
        ];

        yield '5' => [
            [1, 1, 2, 'Fizz', 'Buzz'],
            5,
        ];

        yield '20' => [
            [1, 1, 2, "Fizz", "Buzz", 8, 13, "Fizz", 34, "Buzz", 89, "Fizz", 233, 377, "Buzz", "Fizz", 1597, 2584, 4181, "FizzBuzz"],
            20,
        ];
    }
}