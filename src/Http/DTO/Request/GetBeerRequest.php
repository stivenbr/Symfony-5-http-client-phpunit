<?php

namespace App\Http\DTO\Request;

use App\Http\DTO\RequestDTO;
use Symfony\Component\HttpFoundation\Request;

class GetBeerRequest implements RequestDTO
{
    /**
     * @Assert\NotBlank()
     */
    private $id;

    public function __construct(Request $request)
    {
        $this->id = $request->attributes->get('id');
    }

    public function getId(): ?string
    {
        return $this->id;
    }

}