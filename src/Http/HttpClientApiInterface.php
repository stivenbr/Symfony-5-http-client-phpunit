<?php

namespace App\Http;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface HttpClientApiInterface
{
    public function get(string $uri, array $query = []) : ResponseInterface;
}