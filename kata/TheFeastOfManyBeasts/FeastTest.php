<?php

declare(strict_types=1);

namespace Kata\TheFeastOfManyBeasts;

use Generator;
use PHPUnit\Framework\TestCase;

final class FeastTest extends TestCase
{
    /**
     * @dataProvider provideFeast
     */
    public function testFeast(bool $expected, string $beast, string $dish): void
    {
        $feast = new Feast();
        self::assertSame($expected, $feast->feast($beast, $dish));
    }

    public function provideFeast(): Generator
    {
        yield 'great blue heron' => [
            true,
            'great blue heron',
            'garlic naan',
        ];

        yield 'chickadee' => [
            true,
            'chickadee',
            'chocolate cake',
        ];

        yield 'brown bear' => [
            false,
            'brown bear',
            'bear claw',
        ];

        yield 'fred, the funky zebra' => [
            true,
            'fred, the funky zebra',
            'fresh vanilla tortilla',
        ];
    }
}