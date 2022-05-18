<?php

namespace App\Http\DTO\Request;

use App\Http\DTO\RequestDTO;
use Symfony\Component\HttpFoundation\Request;

class GetListBeersRequest implements RequestDTO
{
    private $food;

    public function __construct(Request $request)
    {
        $this->food = $request->query->get('food');
    }

    public function getFood() : ?string
    {
        return trim($this->food);
    }
}