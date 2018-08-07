<?php

declare(strict_types=1);

namespace Locastic\Component\OibValidator\Tests\Validator;

use Locastic\Component\OibValidator\Utils\OibContentChecker;
use Locastic\Component\OibValidator\Validator\Constraints\Oib;
use Locastic\Component\OibValidator\Validator\Constraints\OibValidator;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

class OibValidatorTest extends ConstraintValidatorTestCase
{
    public function testNullIsNotValid()
    {
        $this->constraint = new Oib();

        $this->validator->validate('', $this->constraint);

        /** @var ConstraintViolationListInterface $violations */
        $violations = $this->context->getViolations();

        $this->assertEquals(1, \count($violations));
    }

    public function testFalseCheckDigitIsNotValid()
    {
        $this->constraint = new Oib();

        $this->validator->validate('12345678901', $this->constraint);

        /** @var ConstraintViolationListInterface $violations */
        $violations = $this->context->getViolations();

        $this->assertEquals(1, \count($violations));
    }

    public function testValidOibPasses()
    {
        $this->constraint = new Oib();

        $this->validator->validate('99426922096', $this->constraint);

        $this->assertNoViolation();
    }

    protected function createValidator()
    {
        return new OibValidator(
            new OibContentChecker()
        );
    }
}