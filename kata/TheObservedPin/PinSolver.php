<?php

declare(strict_types=1);

namespace Kata\TheObservedPin;

final class PinSolver
{
    public function getPins(string $observed): array
    {
        $keyMap = [
            '0' => ['0', '8'],
            '1' => ['1', '2', '4'],
            '2' => ['1', '2', '3', '5'],
            '3' => ['2', '3', '6'],
            '4' => ['1', '4', '5', '7'],
            '5' => ['2', '4', '5', '6', '8'],
            '6' => ['3', '5', '6', '9'],
            '7' => ['4', '7', '8'],
            '8' => ['0', '5', '7', '8', '9'],
            '9' => ['6', '8', '9'],
        ];

        $pressedKeys = str_split($observed);
        $initial = array_shift($pressedKeys);
        return array_reduce($pressedKeys, function ($possiblePins, $pressedKey) use ($keyMap) {
            $result = [];
            foreach ($possiblePins as $possiblePin) {
                foreach ($keyMap[$pressedKey] as $maybePressedKey) {
                    $result[] = $possiblePin . $maybePressedKey;
                }
            }
            return $result;
        }, $keyMap[$initial]);
    }
}