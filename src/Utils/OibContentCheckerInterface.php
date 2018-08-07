<?php

namespace Locastic\Component\OibValidator\Utils;

interface OibContentCheckerInterface
{
    public function hasOibValidLength(?string $oibValue): bool;

    public function isCheckDigitValid(?string $oibValue, int $checkDigit): bool;

}