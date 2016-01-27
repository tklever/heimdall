<?php

namespace Klever\Heimdall;

trait ScalarGuardTrait
{
    private function assertScalar($scalar, $throwable = null)
    {
        $throwable = ThrowableUtilities::validateAndNormalizeThrowable(
            $throwable,
            new Exception\InvalidArgumentException('Argument must be a scalar value')
        );

        if (!is_scalar($scalar)) {
            throw $throwable;
        }
    }
}
