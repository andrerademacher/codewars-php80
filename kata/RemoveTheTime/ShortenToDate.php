<?php

declare(strict_types=1);

namespace Kata\RemoveTheTime;

final class ShortenToDate
{
    public function shortenToDate(string $longDate): string
    {
        return substr($longDate, 0, strpos($longDate, ',') ?: strlen($longDate));
    }
}