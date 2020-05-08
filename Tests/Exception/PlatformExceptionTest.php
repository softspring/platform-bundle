<?php

namespace Softspring\PlatformBundle\Tests\Manager\Exception;

use Softspring\PlatformBundle\Exception\PlatformException;
use PHPUnit\Framework\TestCase;
use Softspring\PlatformBundle\PlatformInterface;

class PlatformExceptionTest extends TestCase
{
    public function testThrowable()
    {
        $this->assertInstanceOf(\Throwable::class, new PlatformException(-1, ''));
    }

    public function testBasicMethods()
    {
        $exception = new PlatformException(PlatformInterface::PLATFORM_STRIPE, 'stripe_some_error');

        $this->assertEquals(PlatformInterface::PLATFORM_STRIPE, $exception->getPlatformId());
        $this->assertEquals('stripe_some_error', $exception->getPlatformError());
    }
}
