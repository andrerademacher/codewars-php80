<?php

declare(strict_types=1);

namespace Kata\DescendingOrder;

use Generator;
use PHPUnit\Framework\TestCase;

final class DescendingOrderTest extends TestCase
{
    /**
     * @dataProvider provideDescendingOrder
     */
    public function testDescendingOrder(int $expected, int $n): void
    {
        $order = new DescendingOrder();
        self::assertSame($expected, $order->descendingOrder($n));
    }

    public function provideDescendingOrder(): Generator
    {
        yield '0' => [
            0,
            0,
        ];

        yield '1' => [
            1,
            1,
        ];

        yield '8' => [
            8,
            8,
        ];

        yield '10' => [
            10,
            10,
        ];

        yield '11' => [
            11,
            11,
        ];

        yield '12' => [
            21,
            12,
        ];

        yield '17' => [
            71,
            17,
        ];

        yield '25' => [
            52,
            25,
        ];

        yield '89' => [
            98,
            89,
        ];

        yield '100' => [
            100,
            100,
        ];

        yield '101' => [
            110,
            101,
        ];

        yield '102' => [
            210,
            102,
        ];

        yield '109' => [
            910,
            109,
        ];

        yield '110' => [
            110,
            110,
        ];

        yield '2468' => [
            8642,
            2468,
        ];

        yield '12345' => [
            54321,
            12345,
        ];

        yield '192837' => [
            987321,
            192837,
        ];
    }
}