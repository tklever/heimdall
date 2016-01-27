<?php

namespace Klever\Heimdall;

use Traversable;

trait IterableGuardTrait
{
    private function assertIterable($iterable, $throwable = null)
    {
        $throwable = ThrowableUtilities::validateAndNormalizeThrowable(
            $throwable,
            new Exception\InvalidArgumentException(sprintf(
                'Argument must be an array or implement Traversable; [%s] provided',
                is_object($iterable) ? get_class($iterable) : gettype($iterable)
            ))
        );

        if (!is_array($iterable) && !$iterable instanceof Traversable) {
            throw $throwable;
        }
    }
}
