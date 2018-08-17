<?php

declare(strict_types=1);

namespace Locastic\Component\OibValidator\Factory;

use Locastic\Component\OibValidator\Utils\OibContentChecker;
use Locastic\Component\OibValidator\Utils\OibContentCheckerInterface;

class OibContentCheckerFactory
{
    public static function createOibContentChecker(): OibContentCheckerInterface
    {
        if (!class_exists('Locastic\Component\OibValidator\Utils\OibContentChecker')) {
            throw new \RuntimeException('Unable to use oib content checker as the Locastic OibContentChecker is not installed.');
        }
        return new OibContentChecker();
    }
}