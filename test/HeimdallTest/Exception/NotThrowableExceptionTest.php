<?php

namespace Klever\HeimdallTest\Exception;

use Klever\Heimdall\Exception\NotThrowableException;

class NotThrowableExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testFromMixedFactoryReturnsException()
    {
        $exception = NotThrowableException::fromMixed('string');
        $this->assertInstanceOf(NotThrowableException::class, $exception);
    }
}
