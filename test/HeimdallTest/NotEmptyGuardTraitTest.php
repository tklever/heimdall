<?php

namespace Klever\HeimdallTest;

class NotEmptyGuardTraitTest extends AbstractGuardTestCase
{
    public function getAssertionMethodName()
    {
        return 'assertNotEmpty';
    }


    public function getValidValues()
    {
        return [
            ['string'],
            [new \stdClass()],
            [1],
            [[1]]
        ];
    }

    public function getInvalidValues()
    {
        return [
            [null],
            [''],
            [[]],
            [0],
            [false]
        ];
    }
}
