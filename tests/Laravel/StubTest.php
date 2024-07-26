<?php

namespace Thumbrise\Toolkit\Tests\Laravel;

use PHPUnit\Framework\Attributes\Test;

/**
 * @internal
 */
class StubTest extends TestCase
{
    #[Test]
    public function stub()
    {
        $this->artisan('help')->assertOk();
    }
}
