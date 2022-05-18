<?php

namespace App\Service;

use App\Http\DTO\Request\GetListBeersRequest;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetListBeersActionService
{
    private const CURRENT_PUNK_ENDPOINT = '/v2/beers';

    private $client;

    public function __construct(HttpClientInterface $punkClient)
    {
        $this->client = $punkClient;
    }

    public function __invoke(GetListBeersRequest $request) : array
    {
        $beers = [];
        $query = ["per_page" => 80, "page" => 1];

        if($request->getFood() != "")
            $query["food"] = str_replace(" ", "_", $request->getFood());

        do{
            $response = $this->client->request('GET', self::CURRENT_PUNK_ENDPOINT, [
                "query" => $query
            ]);
            $contentBeers = $response->toArray();
            foreach($contentBeers as $beer){
                $beers[] = [
                    "id" => $beer["id"],
                    "name" => $beer["name"],
                    "description" => $beer["description"]
                ];
            }

            $query["page"]++;
        }while(count($contentBeers) >= $query["per_page"]);

        return $beers;
    }
}