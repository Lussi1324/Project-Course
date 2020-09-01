<?php

namespace App\Repository;


use App\Data\TechnologyDTO;
use Database\DatabaseInterface;

class TechnologyRepository implements TechnologyRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * TechnologyRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    /**
     * @return \Generator|TechnologyDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query("SELECT id, name FROM technologies ORDER BY id")
            ->execute()
            ->fetch(TechnologyDTO::class);
    }
}