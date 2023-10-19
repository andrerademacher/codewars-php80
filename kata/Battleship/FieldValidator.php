<?php

declare(strict_types=1);

namespace Kata\Battleship;

final class FieldValidator
{
    /**
     * Returns true, if the given 2D battlefield configuration $field is valid, else false.
     * $field is guaranteed to be a 10x10 2D array, consisting only of
     * 1 - occupied by ship
     * 0 - cell is free
     */
    public function validateBattlefield(array $field): bool
    {
        // list expected ships by length
        $ships = array_combine(range(1, 4), range(4, 1, -1));
        $fieldTransposed = array_map(null, ...$field);

        // simple check if ships touch diagonally

        foreach ($field as $y => $line) {
            foreach ($line as $x => $cell) {
                if (!$field[$y][$x]) {
                    continue;
                }

                $shipLengthHorizontal = $this->getShipLength(array_slice($field[$y], $x));
                $shipLengthVertical = $this->getShipLength(array_slice($fieldTransposed[$x], $y));
                $shipLength = max($shipLengthHorizontal, $shipLengthVertical);

                // ships larger than 4 cells are not supported
                if ($shipLength > 4) {
                    return false;
                }

                // too many ships of the length $shipLength found
                if ($ships[$shipLength] === 0) {
                    return false;
                }

                $ships[$shipLength]--;

                // remove ship from both fields
                for ($countY = 0; $countY < $shipLengthVertical; $countY++) {
                    for ($countX = 0; $countX < $shipLengthHorizontal; $countX++) {

                        // check for diagonally touching ships first
                        $shouldBeEmpty = [
                            $field[$y - 1][$x - 1] ?? 0,
                            $field[$y - 1][$x + 1] ?? 0,
                            $field[$y + 1][$x - 1] ?? 0,
                            $field[$y + 1][$x + 1] ?? 0,
                        ];

                        if (array_sum($shouldBeEmpty) > 0) {
                            return false;
                        }

                        // then remove ship
                        $field[$y + $countY][$x + $countX] = 0;
                        $fieldTransposed[$x + $countX][$y + $countY] = 0;
                    }
                }
            }
        }

        return array_sum($ships) === 0;
    }

    public function getShipLength(array $cells): int
    {
        return array_search(0, $cells, true) ?: count($cells);
    }
}