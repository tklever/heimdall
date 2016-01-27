<?php

namespace Klever\HeimdallTest;

use Klever\HeimdallTest\TestAsset\CustomException;
use Klever\HeimdallTest\TestAsset\GuardedObject;

abstract class AbstractGuardTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GuardedObject $concrete
     */
    protected $concrete;

    protected function setUp()
    {
        $this->concrete = new GuardedObject();
    }


    abstract public function getAssertionMethodName();
    abstract public function getValidValues();
    abstract public function getInvalidValues();

    /**
     * @dataProvider getValidValues
     */
    public function testGuardReturnsVoidOnValidInput($value)
    {
        $this->assertNull(call_user_func([$this->concrete, $this->getAssertionMethodName()], $value));
    }

    /**
     * @dataProvider getInvalidValues
     * @expectedException \InvalidArgumentException
     */
    public function testGuardThrowsExceptionOnInvalidInput($value)
    {
        call_user_func([$this->concrete, $this->getAssertionMethodName()], $value);
    }

    public function testGuardThrowsCustomExceptionWhenProvided()
    {
        $message = 'exceptionMessage';
        $code    = 123;

        $this->setExpectedException(CustomException::class, $message, $code);
        call_user_func(
            [$this->concrete, $this->getAssertionMethodName()],
            null,
            new CustomException($message, $code)
        );
    }
}
