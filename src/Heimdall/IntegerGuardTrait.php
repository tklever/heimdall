<?php

namespace Klever\Heimdall;

trait IntegerGuardTrait
{
    private function assertInteger($integer, $throwable = null)
    {
        $throwable = ThrowableUtilities::validateAndNormalizeThrowable(
            $throwable,
            new Exception\InvalidArgumentException('Argument must be an integer')
        );

        if (!is_int($integer)) {
            throw $throwable;
        }
    }
}
