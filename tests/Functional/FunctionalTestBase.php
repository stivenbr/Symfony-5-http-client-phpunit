<?php

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FunctionalTestBase extends WebTestCase
{
    private static $client = null;
    protected static $baseClient = null;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        if (null === self::$client) {
            self::$client = static::createClient();
        }

        if (null === self::$baseClient) {
            self::$baseClient = clone self::$client;
            // self::$baseClient->setServerParameters([
            //     'CONTENT_TYPE' => 'application/json',
            //     'HTTP_ACCEPT' => 'application/json',
            // ]);
        }
    }
}