<?php

declare(strict_types=1);

namespace Kata\NextHigherNumberBits;

use Generator;
use PHPUnit\Framework\TestCase;

final class NextHigherNumberBitsTest extends TestCase
{
    /**
     * @dataProvider provideNextHigher
     */
    public function testNextHigher(int $expected, int $input): void
    {
        $nextHigherNumberBits = new NextHigherNumberBits();
        self::assertSame($expected, $nextHigherNumberBits->nextHigher($input));
    }

    public function provideNextHigher(): Generator
    {
        yield 'example 1' => [2, 1];
        yield 'example 2' => [4, 2];
        yield 'example 3' => [8, 4];
        yield 'example 4' => [191, 127];
        yield 'example 5' => [256, 128];
        yield 'example 6' => [1279, 1022];
        yield 'example 7' => [1253359, 1253343];
    }
}