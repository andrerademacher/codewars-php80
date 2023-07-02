<?php

declare(strict_types=1);

namespace Kata\SquareIntoSquares;

use Generator;
use PHPUnit\Framework\TestCase;

final class RecursiveSolutionTest extends TestCase
{
    /**
     * @dataProvider provideSolution
     */
    public function testSolution(?array $expected, int $input): void
    {
        $solution = new RecursiveSolution();
        self::assertSame($expected, $solution->decompose($input));
    }

    public function provideSolution(): Generator
    {
        // negative input is not allowed
        yield '-2' => [
            null,
            -2,
        ];

        // only positive input is allowed
        yield '0' => [
            null,
            0,
        ];

        // edge case: result [n] is not allowed
        yield '1' => [
            null,
            1,
        ];

        // the values in the result array all have to be unique, so there is no valid solution
        yield '2' => [
            null,
            2,
        ];

        // first valid solution:
        yield '5' => [
            [3, 4,],
            5,
        ];

        // no solution
        yield '6' => [
            null,
            6,
        ];

        // second valid solution:
        yield '7' => [
            [2, 3, 6,],
            7,
        ];

        // no solution
        yield '8' => [
            null,
            8,
        ];

        yield '9' => [
            [1, 4, 8,],
            9,
        ];

        yield '10' => [
            [6, 8,],
            10,
        ];

        yield '11' => [
            [1, 2, 4, 10,],
            11,
        ];

        // no solution
        yield '12' => [
            [1, 2, 3, 7, 9,],
            12,
        ];

        yield '44' => [
            [2, 3, 5, 7, 43,],
            44,
        ];

        yield '50' => [
            [1, 3, 5, 8, 49,],
            50,
        ];
    }
}