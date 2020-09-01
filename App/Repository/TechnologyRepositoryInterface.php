<?php

namespace App\Repository;


use App\Data\TechnologyDTO;

interface TechnologyRepositoryInterface
{
    /**
     * @return \Generator|TechnologyDTO[]
     */
    public function findAll() : \Generator;
}