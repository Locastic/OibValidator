<?php

declare(strict_types=1);

namespace Locastic\Component\OibValidator\Validator\Constraints;

use Locastic\Component\OibValidator\Factory\OibContentCheckerFactory;
use Locastic\Component\OibValidator\Utils\CheckDigitResolver;
use Locastic\Component\OibValidator\Utils\OibContentCheckerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class OibValidator extends ConstraintValidator
{
    /**
     * @var OibContentCheckerInterface
     */
    private $contentChecker;

    public function __construct(OibContentCheckerInterface $contentChecker = null)
    {
        $this->contentChecker = $contentChecker;
    }

    public function validate($value, Constraint $constraint)
    {
        if (null === $value || '' === $value) {
            return;
        }

        if (!$this->getContentChecker()->hasOibValidLength($value)) {
            $this->context->buildViolation($constraint->lengthMessage)
                ->addViolation();
            return;
        }

        /** @var CheckDigitResolver $checkDigitResolver */
        $checkDigitResolver = new CheckDigitResolver($value);
        $checkDigit = $checkDigitResolver->resolve();

        if (!$this->contentChecker->isCheckDigitValid($value, $checkDigit)) {
            $this->context->buildViolation($constraint->checkDigitMessage)
                ->addViolation();
        }
    }

    private function getContentChecker(): OibContentCheckerInterface
    {
        if (null === $this->contentChecker) {
            $this->contentChecker = OibContentCheckerFactory::createOibContentChecker();
        }

        return $this->contentChecker;
    }
}