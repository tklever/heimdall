<?php

namespace Klever\HeimdallTest;

class NotNullGuardTraitTest extends AbstractGuardTestCase
{
    public function getAssertionMethodName()
    {
        return 'assertNotNull';
    }

    public function getValidValues()
    {
        return [
            [1],
            ['1'],
            [1.32],
            [0],
            [true],
            [false],
            [new \stdClass()],
            [[]],
        ];
    }

    public function getInvalidValues()
    {
        return [
            [null],
        ];
    }
}
