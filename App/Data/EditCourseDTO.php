<?php

namespace App\Data;


class EditCourseDTO extends CourseDTO
{
    private $technologies;

    /**
     * @return TechnologyDTO[]|\Generator
     */
    public function getTechnologies():\Generator
    {
        return $this->technologies;
    }

    /**
     * @param mixed $technologies
     */
    public function setTechnologies($technologies): void
    {
        $this->technologies = $technologies;
    }






}