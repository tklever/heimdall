<?php

namespace Klever\HeimdallTest\TestAsset;

use Klever\Heimdall\IntegerGuardTrait;
use Klever\Heimdall\IterableGuardTrait;
use Klever\Heimdall\NotEmptyGuardTrait;
use Klever\Heimdall\NotNullGuardTrait;
use Klever\Heimdall\NumericGuardTrait;
use Klever\Heimdall\ScalarGuardTrait;
use Klever\Heimdall\StringGuardTrait;

class GuardedObject
{
    use IterableGuardTrait {
        assertIterable as public;
    }

    use StringGuardTrait {
        assertString as public;
    }

    use NotEmptyGuardTrait {
        assertNotEmpty as public;
    }

    use NumericGuardTrait {
        assertNumeric as public;
    }

    use IntegerGuardTrait {
        assertInteger as public;
    }

    use NotNullGuardTrait {
        assertNotNull as public;
    }

    use ScalarGuardTrait {
        assertScalar as public;
    }
}