<?php

namespace Klever\HeimdallTest;

use Klever\HeimdallTest\TestAsset\StringableClass;

class StringGuardTraitTest extends AbstractGuardTestCase
{
    public function getAssertionMethodName()
    {
        return 'assertString';
    }

    public function getValidValues()
    {
        return [
            ['string'],
            [new StringableClass()]
        ];
    }

    public function getInvalidValues()
    {
        return [
            [null],
            [1],
            [new \stdClass()],
            [false],
            [[]]
        ];
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGuardThrowsExceptionOnObjectInStrictMode()
    {
        $this->concrete->assertString(new StringableClass(), null, false);
    }
}
