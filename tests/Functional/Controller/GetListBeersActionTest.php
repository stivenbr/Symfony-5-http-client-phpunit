<?php

namespace App\Tests\Functional\Controller;

use App\Tests\Functional\FunctionalTestBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetListBeersActionTest extends FunctionalTestBase
{
    private const ENDPOINT = '/api/v1/beers';

    public function testGetListBeersAction()
    {
        self::$baseClient->request(Request::METHOD_GET, self::ENDPOINT);

        $response = self::$baseClient->getResponse();

        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }
}