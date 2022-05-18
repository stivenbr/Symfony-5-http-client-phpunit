<?php

namespace App\Controller;

use App\Http\DTO\Request\GetListBeersRequest;
use App\Service\GetListBeersActionService;
use Symfony\Component\HttpFoundation\Response;

class GetListBeersAction extends AbstractApiController
{
    private $getListBeersActionService;

    public function __construct(GetListBeersActionService $getListBeersActionService)
    {
        $this->getListBeersActionService = $getListBeersActionService;
    }

    public function __invoke(GetListBeersRequest $request) : Response
    {
        $beers = $this->getListBeersActionService->__invoke($request);
        return $this->respond($beers);
    }
}