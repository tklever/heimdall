<?php

namespace Klever\Heimdall;

trait StringGuardTrait
{
    private function assertString($string, $throwable = null, $allowObjects = true)
    {
        $throwable = ThrowableUtilities::validateAndNormalizeThrowable(
            $throwable,
            new Exception\InvalidArgumentException('Argument must be a string')
        );

        if ($allowObjects && is_object($string) && method_exists($string, '__toString')) {
            return;
        }

        if (!is_string($string)) {
            throw $throwable;
        }
    }
}
