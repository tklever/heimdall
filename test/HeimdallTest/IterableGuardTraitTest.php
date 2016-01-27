<?php

namespace Klever\HeimdallTest;

class IterableGuardTraitTest extends AbstractGuardTestCase
{
    public function getAssertionMethodName()
    {
        return 'assertIterable';
    }

    public function getValidValues()
    {
        return [
            [[]],
            [new \ArrayObject([])]
        ];
    }

    public function getInvalidValues()
    {
        return [
            ['string'],
            [1],
            [null],
            [new \stdClass()]
        ];
    }
}
