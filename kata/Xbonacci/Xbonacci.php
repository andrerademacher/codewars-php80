<?php

declare(strict_types=1);

namespace Kata\Xbonacci;

final class Xbonacci
{
    public function xbonacci(array $signature, int $numberOfElements): array
    {
        $signatureLength = count($signature);
        $result = array_slice($signature, 0, $numberOfElements);
        for ($elementToCompute = $signatureLength + 1; $elementToCompute <= $numberOfElements; $elementToCompute++) {
            $result[] = array_sum(array_slice($result, $elementToCompute - $signatureLength - 1));
        }

        return $result;
    }
}