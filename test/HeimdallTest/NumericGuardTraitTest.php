<?php

namespace Klever\HeimdallTest;

class NumericGuardTraitTest extends AbstractGuardTestCase
{
    public function getAssertionMethodName()
    {
        return 'assertNumeric';
    }

    public function getValidValues()
    {
        return [
            ['1'],
            [1.34],
            [0],
            ['0'],
        ];
    }

    public function getInvalidValues()
    {
        return [
            [null],
            [false],
            [new \stdClass()],
            [[]],
        ];
    }
}
