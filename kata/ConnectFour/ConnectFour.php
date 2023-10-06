<?php

declare(strict_types=1);

namespace Kata\ConnectFour;

final class ConnectFour
{
    public function whoIsWinner(array $moves): string
    {
        // create empty board
        $board = [];
        foreach (range('A', 'G') as $column) {
            $board[$column] = array_fill(0, 6, ' ');
        }

        $columnHeight = array_combine(
            range('A', 'G'),
            array_fill(0, 7, 0)
        );

        foreach ($moves as $move) {
            [$column, $playerName] = explode('_', $move);

            $board[$column][$columnHeight[$column]] = $playerName[0];
            $columnHeight[$column]++;

            $waysToWin = $this->buildWaysToWin($board);
            foreach ($waysToWin as $wayToWin) {
                if ($this->hasFourConsecutivePieces($playerName[0], $wayToWin)) {
                    return $playerName;
                }
            }
        }

        return 'Draw';
    }

    public function hasFourConsecutivePieces(string $playerPiece, array $pieces): bool
    {
        $consecutivePieces = 0;
        foreach ($pieces as $piece) {
            $consecutivePieces = ($piece === $playerPiece)
                ? $consecutivePieces + 1
                : 0;

            if ($consecutivePieces === 4) {
                return true;
            }
        }

        return false;
    }

    private function buildWaysToWin(array $board): array
    {
        $waysToWin = [];

        // horizontally
        for ($row = 0; $row < 6; $row++) {
            $waysToWin[] = [$board['A'][$row], $board['B'][$row], $board['C'][$row], $board['D'][$row], $board['E'][$row], $board['F'][$row], $board['G'][$row]];
        }

        // vertically
        foreach (range('A', 'G') as $column) {
            $waysToWin[] = [$board[$column][0], $board[$column][1], $board[$column][2], $board[$column][3], $board[$column][4], $board[$column][5]];
        }

        // diagonally rising
        $waysToWin[] = [$board['A'][2], $board['B'][3], $board['C'][4], $board['D'][5]];
        $waysToWin[] = [$board['A'][1], $board['B'][2], $board['C'][3], $board['D'][4], $board['E'][5]];
        $waysToWin[] = [$board['A'][0], $board['B'][1], $board['C'][2], $board['D'][3], $board['E'][4], $board['F'][5]];
        $waysToWin[] = [$board['B'][0], $board['C'][1], $board['D'][2], $board['E'][3], $board['F'][4], $board['G'][5]];
        $waysToWin[] = [$board['C'][0], $board['D'][1], $board['E'][2], $board['F'][3], $board['G'][4]];
        $waysToWin[] = [$board['D'][0], $board['E'][1], $board['F'][2], $board['G'][3]];

        // diagonally falling
        $waysToWin[] = [$board['A'][3], $board['B'][2], $board['C'][1], $board['D'][0]];
        $waysToWin[] = [$board['A'][4], $board['B'][3], $board['C'][2], $board['D'][1], $board['E'][0]];
        $waysToWin[] = [$board['A'][5], $board['B'][4], $board['C'][3], $board['D'][2], $board['E'][1], $board['F'][0]];
        $waysToWin[] = [$board['B'][5], $board['C'][4], $board['D'][3], $board['E'][2], $board['F'][1], $board['G'][0]];
        $waysToWin[] = [$board['C'][5], $board['D'][4], $board['E'][3], $board['F'][2], $board['G'][1]];
        $waysToWin[] = [$board['D'][5], $board['E'][4], $board['F'][3], $board['G'][2]];

        return $waysToWin;
    }
}