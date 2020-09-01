<?php

namespace App\Service;


use App\Data\EditCourseDTO;
use App\Data\FullCourseDTO;
use App\Data\CourseDTO;
use App\Data\MyCourseDTO;
use App\Data\MyCourseTempDTO;
use App\Repository\CourseRepositoryInterface;

class CourseService implements CourseServiceInterface
{
    /**
     * @var CourseRepositoryInterface
     */
    private $courseRepository;

    /**
     * @var UserServiceInterface
     */
    private $userService;
    /**
     * CourseService constructor.
     * @param CourseRepositoryInterface $courseRepository
     */
    public function __construct(CourseRepositoryInterface $courseRepository,UserServiceInterface $userService)
    {
        $this->courseRepository = $courseRepository;
        $this->userService = $userService;
    }


    public function create(CourseDTO $course)
    {
        $this->courseRepository->add($course);
    }

    /**
     * @param int $userId
     * @return MyCourseTempDTO[]|\Generator
     */
    public function getByUserId(int $userId)
    {
        $currentUser =$this->userService->currentUser();
        $coursesGenerator= $this->courseRepository->findByUserId($currentUser->getId());

        $courses = array();
        foreach ($coursesGenerator as $course){
            $courses[]=$course;
        }
        $myCourseTemp = new MyCourseTempDTO($courses,$currentUser);
        return $myCourseTemp;
    }


    /**
     * @return FullCourseDTO[]|\Generator
     */
    public function getAll(): \Generator
    {
        return $this->courseRepository->findAll();
    }

    /**
     * @param EditCourseDTO $course
     * @param int $userId
     * @throws \Exception
     */
    public function edit(EditCourseDTO $course, int $userId)
    {
       $courses = $this->courseRepository->findByUserId($userId);
       $hasCourse = false;
       foreach ($courses as $userCourse) {
           if ($userCourse->getId() == $course->getId()) {
               $hasCourse = true;
               break;
           }
       }

       if (!$hasCourse) {
           throw new \Exception('Not an owner');
       }

       $this->courseRepository->edit($course);
    }

    public function getOne(int $id): FullCourseDTO
    {
        return $this->courseRepository->findOne($id);
    }

    public function delete(int $courseId, int $userId)
    {

        $course = $this->getOne($courseId);

        if ($course->getUserId() != $userId) {
            throw new \Exception('Not an owner');
        }

        $this->courseRepository->delete($courseId);
    }
}