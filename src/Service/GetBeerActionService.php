<?php

namespace App\Service;

use App\Http\DTO\Request\GetBeerRequest;
use App\Http\HttpClientApiInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetBeerActionService
{
    private const CURRENT_PUNK_ENDPOINT = '/v2/beers';

    private $client;

    public function __construct(HttpClientInterface $punkClient)
    {
        $this->client = $punkClient;
    }

    public function __invoke(GetBeerRequest $request) : array
    {
        $response = $this->client->request('GET', \sprintf(
            '%s/%s',
            self::CURRENT_PUNK_ENDPOINT,
            $request->getId()
        ));

        if($response->getStatusCode() !== Response::HTTP_OK)
            throw new NotFoundHttpException(\sprintf('No results found by id %s', $request->getId()));

        $data = $response->toArray();
        $beer = $data[0];
        return [
            "image_url" => $beer["image_url"],
            "tagline" => $beer["tagline"],
            "first_brewed" => $beer["first_brewed"]
        ];
    }
}