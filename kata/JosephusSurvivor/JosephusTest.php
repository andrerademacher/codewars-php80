<?php

declare(strict_types=1);

namespace Kata\JosephusSurvivor;

use Generator;
use PHPUnit\Framework\TestCase;

final class JosephusTest extends TestCase
{
    /**
     * @dataProvider provideSurvivor
     */
    public function testSurvivor(int $expected, int $n, int $k): void
    {
        $josephus = new Josephus();
        self::assertSame($expected, $josephus->survivor($n, $k));
    }

    public function provideSurvivor(): Generator
    {
        yield 'only one person' => [
            1,
            1,
            1,
        ];

        yield 'two persons' => [
            1,
            2,
            2,
        ];

        yield 'three persons' => [
            3,
            3,
            2,
        ];

        yield 'example 1' => [
            4,
            7,
            3,
        ];

        yield 'example 2' => [
            10,
            11,
            19,
        ];

        yield 'example 3' => [
            1,
            1,
            300,
        ];

        yield 'example 4' => [
            13,
            14,
            2,
        ];

        yield 'example 5' => [
            100,
            100,
            1,
        ];
    }
}