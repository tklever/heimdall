<?php

namespace Klever\HeimdallTest;

class ScalarGuardTraitTest extends AbstractGuardTestCase
{
    public function getAssertionMethodName()
    {
        return 'assertScalar';
    }

    public function getValidValues()
    {
        return [
            ['1'],
            [1.34],
            [0],
            ['0'],
            [false],
            [true],
            ['string'],
        ];
    }

    public function getInvalidValues()
    {
        return [
            [null],
            [new \stdClass()],
            [[]],
        ];
    }
}
