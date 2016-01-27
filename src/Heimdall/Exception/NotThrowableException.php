<?php

namespace Klever\Heimdall\Exception;

class NotThrowableException extends InvalidArgumentException
{
    public static function fromMixed($mixed, $argumentName = 'Argument')
    {
        return new self(sprintf(
            '%s must be an instance of Throwable, [%s] given',
            $argumentName,
            is_object($mixed) ? get_class($mixed) : gettype($mixed)
        ));
    }
}
