<?php

declare(strict_types=1);

namespace Kata\ResistorColorCodes;

use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Tests known inputs of decoding resistor color codes.
 */
final class ResistorColorCodesTest extends TestCase
{
    /**
     * @dataProvider provideDecodeResistorColorCodes
     */
    public function testDecodeResistorColorCodes(string $expected, string $input): void
    {
        self::assertSame($expected, (new ResistorColorCodes())->decodeResistorColors($input));
    }

    public function provideDecodeResistorColorCodes(): Generator
    {
        yield 'brown black black' => [
            '10 ohms, 20%',
            'brown black black',
        ];

        yield 'brown black brown gold' => [
            '100 ohms, 5%',
            'brown black brown gold',
        ];

        yield 'red red brown' => [
            '220 ohms, 20%',
            'red red brown',
        ];

        yield 'orange orange brown gold' => [
            '330 ohms, 5%',
            'orange orange brown gold',
        ];

        yield 'yellow violet brown silver' => [
            '470 ohms, 10%',
            'yellow violet brown silver',
        ];

        yield 'blue gray brown' => [
            '680 ohms, 20%',
            'blue gray brown',
        ];

        yield 'brown black red silver' => [
            '1k ohms, 10%',
            'brown black red silver',
        ];

        yield 'yellow violet orange gold' => [
            '47k ohms, 5%',
            'yellow violet orange gold',
        ];

        yield 'red black green gold' => [
            '2M ohms, 5%',
            'red black green gold',
        ];
    }
}