<?php

declare(strict_types=1);

namespace Locastic\Component\OibValidator\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class Oib extends Constraint
{
    /** @var string */
    public $lengthMessage = 'Invalid length of entered OIB.';

    /** @var string */
    public $checkDigitMessage = 'Entered invalid OIB.';

    public function validatedBy()
    {
        return get_class($this) . 'Validator';
    }
}