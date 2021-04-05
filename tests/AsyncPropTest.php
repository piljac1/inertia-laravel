<?php

namespace Inertia\Tests;

use Illuminate\Http\Request;
use Inertia\asyncProp;

class AsyncPropTest extends TestCase
{
    public function test_can_invoke()
    {
        $asyncProp = new AsyncProp(function () {
            return 'An async value';
        });

        $this->assertSame('An async value', $asyncProp());
    }

    public function test_can_resolve_bindings_when_invoked()
    {
        $asyncProp = new AsyncProp(function (Request $request) {
            return $request;
        });

        $this->assertInstanceOf(Request::class, $asyncProp());
    }
}
