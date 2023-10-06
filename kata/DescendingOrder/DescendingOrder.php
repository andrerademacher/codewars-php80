<?php

declare(strict_types=1);

namespace Kata\DescendingOrder;

final class DescendingOrder
{
    public function descendingOrder(int $n): int
    {
        $digits = str_split((string)$n);
        rsort($digits);
        return (int)implode('', $digits);
    }
}