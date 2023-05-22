<?php

declare(strict_types=1);

namespace Kata\RemoveTheTime;

use Generator;
use PHPUnit\Framework\TestCase;

final class ShortenToDateTest extends TestCase
{
    /**
     * @dataProvider provideShortenToDate
     */
    public function testShortenToDate(string $expected, string $longDate): void
    {
        self::assertSame($expected, (new ShortenToDate())->shortenToDate($longDate));
    }

    public function provideShortenToDate(): Generator
    {
        yield 'empty string' => [
            '', '',
        ];

        yield 'Friday May 2, 9am' => [
            'Friday May 2',
            'Friday May 2, 9am',
        ];

        yield 'Tuesday January 29, 10pm' => [
            'Tuesday January 29',
            'Tuesday January 29, 10pm',
        ];

        yield 'Monday December 25, 10pm' => [
            'Monday December 25',
            'Monday December 25, 10pm',
        ];
    }
}