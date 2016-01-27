<?php

namespace Klever\Heimdall;

trait NotEmptyGuardTrait
{
    private function assertNotEmpty($notEmpty, $throwable = null)
    {
        $throwable = ThrowableUtilities::validateAndNormalizeThrowable(
            $throwable,
            new Exception\InvalidArgumentException('Argument must not be empty')
        );

        if (empty($notEmpty)) {
            throw $throwable;
        }
    }
}
