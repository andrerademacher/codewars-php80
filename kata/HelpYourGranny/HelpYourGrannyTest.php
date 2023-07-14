<?php

declare(strict_types=1);

namespace Kata\HelpYourGranny;

use Generator;
use PHPUnit\Framework\TestCase;

final class HelpYourGrannyTest extends TestCase
{
    /**
     * @dataProvider provideTour
     */
    public function testTour(int $expected, array $friends, array $towns, array $distances): void
    {
        $granny = new HelpYourGranny();
        self::assertSame($expected, $granny->tour($friends, $towns, $distances));
    }

    public function provideTour(): Generator
    {
        yield 'granny has no friends' => [
            0,
            [],
            [],
            [],
        ];

        yield 'granny has 1 friend with known town and distance' => [
            20,
            ['Bert'],
            [['Bert', 'SimCity']],
            ['SimCity' => 10.0],
        ];

        yield 'granny has 2 friends with known town and distance' => [
            286,
            ['Bert', 'Hugo'],
            [['Bert', 'SimCity'], ['Hugo', 'KnowWhere']],
            ['SimCity' => 100.0, 'KnowWhere' => 120.0],
        ];

        yield 'kata example' => [
            889,
            ['A1', 'A2', 'A3', 'A4', 'A5'],
            [['A1', 'X1'], ['A2', 'X2'], ['A3', 'X3'], ['A4', 'X4']],
            ['X1' => 100.0, 'X2' => 200.0, 'X3' => 250.0, 'X4' => 300.0],
        ];
    }
}