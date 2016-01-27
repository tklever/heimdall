<?php

namespace Klever\Heimdall;

trait NotNullGuardTrait
{
    private function assertNotNull($notNull, $throwable = null)
    {
        $throwable = ThrowableUtilities::validateAndNormalizeThrowable(
            $throwable,
            new Exception\InvalidArgumentException('Argument must not be null')
        );

        if ($notNull === null) {
            throw $throwable;
        }
    }
}
