<?php

namespace App\Service;


use App\Data\TechnologyDTO;
use App\Repository\TechnologyRepositoryInterface;

class TechnologyService implements TechnologyServiceInterface
{
    /**
     * @var TechnologyRepositoryInterface
     */
    private $technologyRepository;

    public function __construct(TechnologyRepositoryInterface $technologyRepository)
    {
        $this->technologyRepository = $technologyRepository;
    }


    /**
     * @return \Generator|TechnologyDTO[]
     */
    public function getAll(): \Generator
    {
        return $this->technologyRepository->findAll();
    }
}