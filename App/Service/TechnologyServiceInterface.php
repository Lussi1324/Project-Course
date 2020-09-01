<?php

namespace App\Service;

use App\Data\TechnologyDTO;

interface TechnologyServiceInterface
{

    /**
     * @return \Generator|TechnologyDTO[]
     */
    public function getAll() : \Generator;
}