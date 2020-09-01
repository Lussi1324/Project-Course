<?php

namespace App\Repository;


use App\Data\EditCourseDTO;
use App\Data\FullCourseDTO;
use App\Data\CourseDTO;
use App\Data\MyCourseDTO;

interface CourseRepositoryInterface
{
    public function add(CourseDTO $course);

    /**
     * @param int $userId
     * @return MyCourseDTO[]\Generator
     */
    public function findByUserId(int $userId): \Generator;

    /**
     * @return FullCourseDTO[]|\Generator
     */
    public function findAll(): \Generator;

    public function findOne(int $id): FullCourseDTO;

    public function edit(EditCourseDTO $course);

    public function delete(int $id);
}