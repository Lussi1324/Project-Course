<?php

namespace App\Data;


class MyCourseTempDTO
{
    private $courses = [];

    private $user = null;

    /**
     * MyCourseTempDTO constructor.
     * @param array $courses
     * @param null $user
     */
    public function __construct(array $courses, UserDTO $user=null)
    {
        $this->courses = $courses;
        $this->user = $user;
    }

    /**
     * @return array of MyCourseDTO
     */
    public function getCourses(): array
    {
        return $this->courses;
    }

    /**
     * @param array $courses of MyCourses $courses
     */
    public function setCourses(array $courses): void
    {
        $this->courses = $courses;
    }



    /**
     * @return UserDTO
     */
    public function getUser() : UserDTO
    {
        return $this->user;
    }

    /**
     * @param UserDTO $user
     */
    public function setUser(UserDTO $user): void
    {
        $this->user = $user;
    }


    public function getCount(): int {
        return count($this->courses);
    }

}