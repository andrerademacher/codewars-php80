<?php

declare(strict_types=1);

namespace Kata\ResistorColorCodes;

/**
 * Decodes the 3+ resistor color bands into the resistance value in ohm.
 */
final class ResistorColorCodes
{
    public function decodeResistorColors(string $bandsString): string
    {
        $map = array_flip(['black', 'brown', 'red', 'orange', 'yellow', 'green', 'blue', 'violet', 'gray', 'white']);
        $bands = array_map('trim', explode(' ', $bandsString));
        $resistance = ($map[$bands[0]] * 10 + $map[$bands[1]]) * (10 ** $map[$bands[2]]);

        $suffix = '';
        if (1_000 <= $resistance && $resistance < 1_000_000) {
            $suffix = 'k';
            $resistance /= 1_000;
        } elseif ($resistance >= 1_000_000) {
            $suffix = 'M';
            $resistance /= 1_000_000;
        }

        $tolerance = match ($bands[3] ?? '') {
            'gold' => '5%',
            'silver' => '10%',
            default => '20%',
        };

        return "$resistance$suffix ohms, $tolerance";
    }
}