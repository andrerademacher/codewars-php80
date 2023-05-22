<?php

declare(strict_types=1);

namespace Kata\Beeramid;

final class Beeramid
{
    public function __invoke(float $referralBonus, float $beerPrice): float
    {
        // free the beer :)
        if ($beerPrice <= 0) {
            return INF;
        }

        $beersToDrink = $referralBonus / $beerPrice;
        for ($level = 1; $beersToDrink >= ($level ** 2); $level++) {
            $beersToDrink -= $level ** 2;
        }

        return --$level;
    }
}