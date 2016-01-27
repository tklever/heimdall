<?php

namespace Klever\HeimdallTest\TestAsset;

class StringableClass
{
    public function __toString()
    {
        return "string";
    }
}