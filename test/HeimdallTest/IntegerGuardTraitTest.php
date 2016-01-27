<?php

namespace Klever\HeimdallTest;

class IntegerGuardTraitTest extends AbstractGuardTestCase
{
    public function getAssertionMethodName()
    {
        return 'assertInteger';
    }

    public function getValidValues()
    {
        return [
            [1],
            [0],
        ];
    }

    public function getInvalidValues()
    {
        return [
            ['1'],
            [1.32],
            [null],
            [false],
            [new \stdClass()],
            [[]],
        ];
    }
}
