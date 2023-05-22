<?php

declare(strict_types=1);

namespace Kata\Beeramid;

use Generator;
use PHPUnit\Framework\TestCase;

final class BeeramidTest extends TestCase
{
    /**
     * @dataProvider provideBeeramid
     */
    public function testBeeramid(float $expectedLevels, float $referralBonus, float $beerPrice): void
    {
        $beeramid = new Beeramid();
        self::assertSame($expectedLevels, $beeramid($referralBonus, $beerPrice));
    }

    public function provideBeeramid(): Generator
    {
        yield 'empty example' => [
            0, 0, 1
        ];

        yield '21 dollars with cheap beer for 1 dollar 50 cents' => [
            3, 21, 1.5
        ];

        yield '1500 dollars with 2 dollar each beer' => [
            12, 1500, 2
        ];

        yield 'free beer :D' => [
            INF, 2000, 0
        ];

        yield 'earn a dollar for each beer' => [
            INF, 1000, -1
        ];
    }
}