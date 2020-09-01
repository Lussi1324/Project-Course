<?php

namespace App\Data;


class TechnologyDTO
{
    private $id;
    private $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return TechnologyDTO
     */
    public function setId($id): TechnologyDTO
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return TechnologyDTO
     */
    public function setName($name): TechnologyDTO
    {
        $this->name = $name;

        return $this;
    }



}