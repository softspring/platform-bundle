<?php

namespace Softspring\PlatformBundle\Tests\Manager\Exception;

use Softspring\PlatformBundle\Exception\PlatformException;
use PHPUnit\Framework\TestCase;

class PlatformExceptionTest extends TestCase
{
    public function testThrowable()
    {
        $this->assertInstanceOf(\Throwable::class, new PlatformException(-1, ''));
    }

    public function testBasicMethods()
    {
        $exception = new PlatformException('stripe', 'stripe_some_error');

        $this->assertEquals('stripe', $exception->getPlatformId());
        $this->assertEquals('stripe_some_error', $exception->getPlatformError());
    }
}
