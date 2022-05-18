<?php

namespace App\Http;

use App\Exception\HttpClientException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class PunkApiHttpClient implements HttpClientApiInterface
{
    private $client;

    public function __construct(HttpClientInterface $punkClient)
    {
        $this->client = $punkClient;
    }

    public function get(string $uri, array $query = []): ResponseInterface
    {
        try {
            $pepe = $this->client->request('GET', $uri, [
                "query" => $query
            ]);
            $pepe->toArray();
        } catch (TransportExceptionInterface $e) {
            throw new HttpClientException(Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }
}