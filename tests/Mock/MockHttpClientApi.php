<?php

namespace App\Tests\Mock;

use App\Http\HttpClientApiInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class MockHttpClientApi implements HttpClientApiInterface
{
    public function get(string $uri, array $query = []): ResponseInterface
    {
        // TODO: Implement get() method.
    }
}