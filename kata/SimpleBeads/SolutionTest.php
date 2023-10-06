<?php

declare(strict_types=1);

namespace Kata\SimpleBeads;

use Generator;
use PHPUnit\Framework\TestCase;

final class SolutionTest extends TestCase
{
    /**
     * @dataProvider provideCountRedBeads
     */
    public function testCountRedBeads(int $expected, int $n): void
    {
        $solution = new Solution();
        self::assertSame($expected, $solution->countRedBeads($n));
    }

    public function provideCountRedBeads(): Generator
    {
        yield '0' => [
            0,
            0,
        ];

        yield '1' => [
            0,
            1,
        ];

        yield '2' => [
            2,
            2,
        ];

        yield '3' => [
            4,
            3,
        ];

        yield '5' => [
            8,
            5,
        ];
    }
}