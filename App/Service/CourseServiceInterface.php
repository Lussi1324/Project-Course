<?php

namespace App\Service;


use App\Data\EditCourseDTO;
use App\Data\FullCourseDTO;
use App\Data\CourseDTO;
use App\Data\MyCourseDTO;
use App\Data\MyCourseTempDTO;

interface CourseServiceInterface
{
    public function create(CourseDTO $course);

    /**
     * @param int $userId
     * @return MyCourseTempDTO[]|\Generator
     */
    public function getByUserId(int $userId);

    /**
     * @return FullCourseDTO[]|\Generator
     */
    public function getAll(): \Generator;

    public function getOne(int $id): FullCourseDTO;

    public function edit(EditCourseDTO $course, int $userId);

    public function delete(int $courseId, int $userId);

}