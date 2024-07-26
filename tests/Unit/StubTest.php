<?php

namespace Thumbrise\Toolkit\Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Thumbrise\LaravelWsNotifier\Stub;

/**
 * @internal
 */
class StubTest extends TestCase
{
    #[Test]
    public function stub()
    {
        $stub = new Stub();

        $result = $stub->stub();

        $this->assertTrue($result);
    }
}
