<?php

namespace App\Tests\Functional\Controller;

use App\Tests\Functional\FunctionalTestBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetBeerActionTest extends FunctionalTestBase
{
    private const ENDPOINT = '/api/v1/beers/%s';

    public function testGetBeerAction()
    {
        $id = "1";

        self::$baseClient->request(Request::METHOD_GET, \sprintf(self::ENDPOINT, $id));

        $response = self::$baseClient->getResponse();

        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }

    public function testGetBeerActionNotFoundId()
    {
        $id = "1000";

        self::$baseClient->request(Request::METHOD_GET, \sprintf(self::ENDPOINT, $id));

        $response = self::$baseClient->getResponse();

        self::assertEquals(Response::HTTP_NOT_FOUND, $response->getStatusCode());
    }
}