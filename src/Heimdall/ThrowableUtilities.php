<?php

namespace Klever\Heimdall;

use Throwable;
use Exception as SplException;

class ThrowableUtilities
{
    public static function isThrowable($throwable)
    {
        if (version_compare(PHP_VERSION, '7.0.0', '>=') && $throwable instanceof Throwable) {
            return true;
        }

        if (version_compare(PHP_VERSION, '7.0.0', '<') && $throwable instanceof SplException) {
            return true;
        }

        return false;
    }

    public static function validateAndNormalizeThrowable($throwable, $default)
    {
        if ($throwable === null) {
            if (!self::isThrowable($default)) {
                throw Exception\NotThrowableException::fromMixed($default, 'Argument 2');
            }
            return $default;
        }

        if (!self::isThrowable($throwable)) {
            throw Exception\NotThrowableException::fromMixed($throwable, 'Throwable');
        }

        return $throwable;
    }
}
