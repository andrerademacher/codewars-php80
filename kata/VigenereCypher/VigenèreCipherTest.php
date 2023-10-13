<?php

declare(strict_types=1);

namespace Kata\VigenereCypher;

use Generator;
use PHPUnit\Framework\TestCase;

final class VigenèreCipherTest extends TestCase
{
    private const ALPHABET = 'abcdefghijklmnopqrstuvwxyz';

    /**
     * @dataProvider provideEncode
     */
    public function testEncode(string $expected, string $clearText, string $password, string $alphabet): void
    {
        $cipher = new VigenèreCipher($password, $alphabet);
        self::assertSame($expected, $cipher->encode($clearText));
    }

    public function provideEncode(): Generator
    {
        yield 'all empty' => [
            '',
            '',
            '',
            '',
        ];

        yield 'historic' => [
            'lxfopvefrnhr',
            'attackatdawn',
            'lemon',
            self::ALPHABET,
        ];
    }

    /**
     * @dataProvider provideDecode
     */
    public function testDecode(string $expected, string $encodedText, string $password, string $alphabet): void
    {
        $cipher = new VigenèreCipher($password, $alphabet);
        self::assertSame($expected, $cipher->decode($encodedText));
    }

    public function provideDecode(): Generator
    {
        yield 'all empty' => [
            '',
            '',
            '',
            '',
        ];

        yield 'historic' => [
            'attackatdawn',
            'lxfopvefrnhr',
            'lemon',
            self::ALPHABET,
        ];
    }
}