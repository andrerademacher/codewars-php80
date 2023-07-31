<?php

declare(strict_types=1);

namespace Kata\TheObservedPin;

use Generator;
use PHPUnit\Framework\TestCase;

final class PinSolverTest extends TestCase
{
    /**
     * @dataProvider provideGetPins
     */
    public function testGetPins(array $expected, string $observed): void
    {
        $solver = new PinSolver();
        self::assertEquals($expected, $solver->getPins($observed));
    }

    public function provideGetPins(): Generator
    {
        yield '8' => [
            ['0', '5', '7', '8', '9'],
            '8',
        ];

        yield '11' => [
            ['11', '12', '14', '21', '22', '24', '41', '42', '44'],
            '11',
        ];

        yield '369' => [
            [
                '236', '238', '239', '256', '258', '259', '266', '268', '269', '296', '298', '299',
                '336', '338', '339', '356', '358', '359', '366', '368', '369', '396', '398', '399',
                '636', '638', '639', '656', '658', '659', '666', '668', '669', '696', '698', '699',
            ],
            '369',
        ];
    }
}