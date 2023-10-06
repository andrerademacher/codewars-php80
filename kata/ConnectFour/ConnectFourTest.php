<?php

declare(strict_types=1);

namespace Kata\ConnectFour;

use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Tests the implementation for the game "connect four".
 */
final class ConnectFourTest extends TestCase
{
    /**
     * @dataProvider provideWhoIsWinner
     */
    public function testWhoIsWinner(string $expected, array $moves): void
    {
        $game = new ConnectFour();
        self::assertSame($expected, $game->whoIsWinner($moves));
    }

    public function provideWhoIsWinner(): Generator
    {
        yield 'no moves' => [
            'Draw',
            [],
        ];

        yield 'player red wins with 4 consecutive moves vertically' => [
            'Red',
            ['A_Red', 'A_Red', 'A_Red', 'A_Red', '', '']
        ];

        yield 'player red wins with 4 consecutive moves vertically with additional pieces' => [
            'Red',
            ['A_Red', 'A_Red', 'A_Red', 'A_Red', 'A_Yellow', '', 'A_Yellow']
        ];


        yield 'player yellow wins with 4 consecutive moves horizontally' => [
            'Yellow',
            ['B_Yellow', 'C_Yellow', 'D_Yellow', 'E_Yellow',]
        ];
    }

    /**
     * @dataProvider provideHasFourConsecutivePieces
     */
    public function testHasFourConsecutivePieces(bool $expected, string $playerPiece, array $pieces): void
    {
        $game = new ConnectFour();
        self::assertSame($expected, $game->hasFourConsecutivePieces($playerPiece, $pieces));
    }

    public function provideHasFourConsecutivePieces(): Generator
    {
        yield 'no pieces' => [
            false,
            'Y',
            [],
        ];

        yield 'one piece' => [
            false,
            'R',
            ['R'],
        ];

        yield 'three of the same pieces' => [
            false,
            'R',
            ['R', 'R', 'R',]
        ];

        yield 'four of the same pieces' => [
            true,
            'Y',
            ['Y', 'Y', 'Y', 'Y',]
        ];

        yield 'four of the same pieces with a gap' => [
            true,
            'Y',
            ['Y', 'Y', 'Y', 'Y', '',]
        ];

        yield 'four of the same pieces, but with an empty space between' => [
            false,
            'Y',
            ['Y', 'Y', ' ', 'Y', 'Y',]
        ];

        yield 'four of the same pieces, but with the other players piece in between' => [
            false,
            'Y',
            ['Y', 'Y', 'R', 'Y', 'Y',]
        ];
    }
}