<?php

namespace Klever\HeimdallTest;

use Klever\Heimdall\ThrowableUtilities;
use Klever\HeimdallTest\TestAsset\CustomException;

class ThrowableUtilTest extends \PHPUnit_Framework_TestCase
{
    public function getThrowableData()
    {
        return [
            [new CustomException, true],
            [new \Exception, true],
            [new \InvalidArgumentException(), true],
            [new \stdClass, false],
            ['string', false],
            [1, false],
        ];
    }

    /**
     * @dataProvider getThrowableData
     */
    public function testIsThrowableReturnsBoolean($input, $return)
    {
        $result = ThrowableUtilities::isThrowable($input);
        $this->assertEquals($return, $result);
    }

    public function testIsThrowableReturnsTrueForError()
    {
        if (version_compare(PHP_VERSION, '7.0.0', '<')) {
            $this->markTestSkipped('PHP Versions >= 7');
        }

        $this->assertTrue(ThrowableUtilities::isThrowable($this->getMock(\Error::class)));
    }

    public function testValidateAndNormalizeReturnsProvidedException()
    {
        $result = ThrowableUtilities::validateAndNormalizeThrowable($exception = new CustomException(), null);
        $this->assertSame($exception, $result);
    }

    public function testValidateAndNormalizeReturnsDefault()
    {
        $result = ThrowableUtilities::validateAndNormalizeThrowable(null, $exception = new CustomException());
        $this->assertSame($exception, $result);
    }

    /**
     * @expectedException \Klever\Heimdall\Exception\InvalidArgumentException
     */
    public function testValidateAndNormalizeThrowsExceptionOnInvalidDefault()
    {
        ThrowableUtilities::validateAndNormalizeThrowable(null, 'INVALID');
    }

    /**
     * @expectedException \Klever\Heimdall\Exception\InvalidArgumentException
     */
    public function testValidateAndNormalizeThrowsExceptionOnInvalidThrowable()
    {
        ThrowableUtilities::validateAndNormalizeThrowable('INVALID', new CustomException());
    }
}
