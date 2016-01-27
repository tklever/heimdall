<?php

namespace Klever\Heimdall;

trait NumericGuardTrait
{
    private function assertNumeric($numeric, $throwable = null)
    {
        $throwable = ThrowableUtilities::validateAndNormalizeThrowable(
            $throwable,
            new Exception\InvalidArgumentException('Argument must be numeric')
        );

        if (!is_numeric($numeric)) {
            throw $throwable;
        }
    }
}
