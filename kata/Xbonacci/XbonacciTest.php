<?php

declare(strict_types=1);

namespace Kata\Xbonacci;

use Generator;
use PHPUnit\Framework\TestCase;

final class XbonacciTest extends TestCase
{
    /**
     * @dataProvider provideXbonacci
     */
    public function testXbonacci(array $expected, array $signature, int $numberOfElements): void
    {
        $xbonacci = new Xbonacci();
        self::assertEquals($expected, $xbonacci->xbonacci($signature, $numberOfElements));
    }

    public function provideXbonacci(): Generator
    {
        yield 'almost fibonacci' => [
            [0, 1, 1, 2, 3, 5, 8, 13, 21, 34],
            [0, 1],
            10,
        ];

        yield 'real fibonacci' => [
            [1, 1, 2, 3, 5, 8, 13, 21, 34, 55],
            [1, 1],
            10,
        ];

        yield 'cinquebonacci with many zeros' => [
            [0, 0, 0, 0, 1, 1, 2, 4, 8, 16],
            [0, 0, 0, 0, 1],
            10,
        ];

        yield 'settibonacci' => [
            [1, 0, 0, 0, 0, 0, 1, 2, 3, 6],
            [1, 0, 0, 0, 0, 0, 1],
            10,
        ];

        yield 'diecibonacci' => [
            [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 2, 4, 8, 16, 32, 64, 128, 256],
            [1, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            20,
        ];

        yield 'diecibonacci with comma with length 10' => [
            [0.5, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0.5, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            10,
        ];

        yield 'diecibonacci with comma with length 20' => [
            [0.5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.5, 0.5, 1, 2, 4, 8, 16, 32, 64, 128],
            [0.5, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            20,
        ];

        yield 'diecibonacci with only zeros with length 20' => [
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            20,
        ];

        yield 'diecibonacci with one to 9 with length 9' => [
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 0],
            9,
        ];

        yield 'diecibonacci with one to 9 with length 0' => [
            [],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 0],
            0,
        ];
    }
}