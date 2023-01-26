<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

function processInput($uri): string
{
    $uri = urldecode(parse_url($uri, PHP_URL_PATH));
    return $uri;
}

class RouteTest extends TestCase
{
    public function test_what_request_url_parce(): void
    {
        $uri = 'http://parce.test/test';
        $this->assertEquals('/test', processInput($uri));
    }
}