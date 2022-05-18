<?php

namespace App\Controller;

use App\Http\DTO\Request\GetBeerRequest;
use App\Service\GetBeerActionService;
use Symfony\Component\HttpFoundation\Response;


class GetBeerAction extends AbstractApiController
{
    private $getBeerActionService;

    public function __construct(GetBeerActionService $getBeerActionService)
    {
        $this->getBeerActionService = $getBeerActionService;
    }

    public function __invoke(GetBeerRequest $request) : Response
    {
        $beer = $this->getBeerActionService->__invoke($request);
        return $this->respond($beer);
    }
}