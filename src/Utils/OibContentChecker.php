<?php

declare(strict_types=1);

namespace Locastic\Component\OibValidator\Utils;

class OibContentChecker implements OibContentCheckerInterface
{
    const oibRequiredLength = 11;

    public function hasOibValidLength(?string $oibValue): bool
    {
        return ((strlen($oibValue) == self::oibRequiredLength) && is_numeric($oibValue));
    }

    public function isCheckDigitValid(?string $oibValue, int $checkDigit): bool
    {
        return ($checkDigit == intval(substr($oibValue, 10, 1), 10));
    }
}