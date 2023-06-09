<?php

declare(strict_types=1);

namespace Kata\NextBiggerNumber;

use Generator;
use PHPUnit\Framework\TestCase;

final class CounterSolutionTest extends TestCase
{
    /**
     * @dataProvider provideNextBigger
     */
    public function testNextBigger(int $expected, int $input): void
    {
        $counterSolution = new CounterSolution();
        self::assertSame($expected, $counterSolution->nextBigger($input));
    }

    public function provideNextBigger(): Generator
    {
        yield 'positive Example 1' => [21, 12];
        yield 'positive Example 2' => [531, 513];
        yield 'positive Example 3' => [2071, 2017];

        yield 'negative Example 1' => [-1, 9];
        yield 'negative Example 2' => [-1, 111];
        yield 'negative Example 3' => [-1, 531];

        yield '414' => [441, 414];
        yield '144' => [414, 144];
        yield '123456789' => [123456798, 123456789];
        yield '1234567890' => [1234567908, 1234567890];
        yield '9876543210' => [-1, 9876543210];
        yield '9999999999' => [-1, 9999999999];
        yield '59884848459853' => [59884848483559, 59884848459853];
    }
}