<?php

namespace App\Data;


class CourseDTO
{
    private const NAME_MIN_LENGTH = 3;
    private const NAME_MAX_LENGTH = 255;

    private const DESCRIPTION_MIN_LENGTH = 10;
    private const DESCRIPTION_MAX_LENGTH = 10000;

    private const IMAGE_MIN_LENGTH = 1;
    private const IMAGE_MAX_LENGTH = 50;


    private $id;
    private $name;
    private $image;
    private $description;
    private $technologyId;
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
     * @return CourseDTO
     * @throws \Exception
     */
    public function setName($name): CourseDTO
    {
        DTOValidator::validate(self::NAME_MIN_LENGTH, self::NAME_MAX_LENGTH,
            $name, "text", "Name");

        $this->name = $name;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     * @return CourseDTO
     * @throws \Exception
     */
    public function setDescription($description): CourseDTO
    {
        DTOValidator::validate(self::DESCRIPTION_MIN_LENGTH, self::DESCRIPTION_MAX_LENGTH,
            $description, "text", "Description");

        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param $image
     * @return CourseDTO
     * @throws \Exception
     */
    public function setImage($image): CourseDTO
    {

        DTOValidator::validate(self::IMAGE_MIN_LENGTH, self::IMAGE_MAX_LENGTH,
            $image, "text", "Image");

        $this->image = $image;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTechnologyId()
    {
        return $this->technologyId;
    }

    /**
     * @param mixed $technologyId
     */
    public function setTechnologyId($technologyId): void
    {
        $this->technologyId = $technologyId;
    }

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