<?php

declare(strict_types=1);

namespace Locastic\Component\OibValidator\Utils;

class CheckDigitResolver
{
    /**
     * @var string
     */
    private $oibValue;

    public function __construct(string $oibValue)
    {
        $this->oibValue = $oibValue;
    }

    public function resolve(): int
    {
        $weightNumber = $this->calculateWeightNumber();

        $checkDigit = 11 - $weightNumber;

        if ($checkDigit == 10) {
            $checkDigit = 0;
        }

        return $checkDigit;

    }

    private function calculateWeightNumber(): int
    {
        //weight
        $a = 10;

        for ($counter = 0; $counter < 10; $counter++) {
            $a += intval(substr($this->oibValue, $counter, 1), 10);
            $a = $a % 10;


            if ($a == 0) {
                $a = 10;
            }

            $a *= 2;
            $a = $a % 11;
        }

        return $a;

    }
}