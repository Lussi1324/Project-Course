<?php

namespace App\Data;


class FullCourseDTO
{
    private $id;
    private $name;
    private $image;
    private $description;
  /*  private $technologyId;*/
    private $userId;



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

//    /**
//     * @return mixed
//     */
//    public function getTechnologyId()
//    {
//        return $this->technologyId;
//    }
//
//    /**
//     * @param mixed $technologyId
//     */
//    public function setTechnologyId($technologyId): void
//    {
//        $this->technologyId = $technologyId;
//    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }



}