<?php
namespace App\Http;

use App\Data\EditCourseDTO;
use App\Data\ErrorDTO;
use App\Data\CourseDTO;
use App\Service\TechnologyServiceInterface;
use App\Service\CourseServiceInterface;
use Core\DataBinderInterface;
use Core\TemplateInterface;

class CourseHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var TechnologyServiceInterface
     */
    private $technologyService;

    /**
     * @var CourseServiceInterface
     */
    private $courseService;



    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder,
                                TechnologyServiceInterface $technologyService,
                                CourseServiceInterface $courseService)
    {
        parent::__construct($template, $dataBinder);
        $this->technologyService = $technologyService;
        $this->courseService = $courseService;
    }

    public function add(array $formData = [])
    {
        if (isset($formData['add'])) {

            $this->handleAddProcess($formData);
        } else {

            $this->render("courses/add", $this->technologyService->getAll());
        }
    }
    public function allCourses()
    {

        $this->render("courses/allCourses", $this->courseService->getAll());
    }

    /**
     * @param array $formData
     * @throws \Exception
     */
    public function edit(array $formData = [])
    {
        if (isset($formData['edit'])) {
            $this->handleEditProcess($formData);
        } else {
            $dto = $this->getEditDTO();
            $this->render("courses/edit", $dto);
        }
    }

    private function handleAddProcess(array $formData)
    {
        try {
            /** @var CourseDTO $dto */
            $dto = $this->dataBinder->bind($formData, CourseDTO::class);
            $dto->setUserId($_SESSION['id']);
            $this->courseService->create($dto);
            $this->redirect("courses.php");
        } catch (\Exception $ex) {
            $this->render("courses/аdd", $this->technologyService->getAll(),
                [$ex->getMessage()]);
        }
    }

    /**
     * @param array $formData
     * @throws \Exception
     */
    private function handleEditProcess(array $formData)
    {
        try {
            /** @var EditCourseDTO $dto */
            $dto = $this->dataBinder->bind($formData, EditCourseDTO::class);
            $dto->setUserId($_SESSION['id']);
            $dto->setId($_GET['id']);
            $this->courseService->edit($dto, $_SESSION['id']);
            $this->redirect("profile.php");
        } catch (\Exception $ex) {
            $dto = $this->getEditDTO();

            $this->render("courses/edit", $dto,
                [$ex->getMessage()]);
        }
    }

    public function delete(array $queryData = [])
    {
        $this->courseService->delete($queryData['id'], $_SESSION['id']);
        $this->redirect('courses.php');
    }

    public function details(array $queryData = [])
    {
        $course = $this->courseService->getOne($queryData['id']);
        $this->render('courses/details', $course);
    }

    /**
     * @return EditCourseDTO
     * @throws \Exception
     */
    private function getEditDTO(): EditCourseDTO
    {
        $course = $this->courseService->getOne($_GET['id']);

        $dto = new EditCourseDTO();
        $dto->setId($course->getId());
        $dto->setName($course->getName());
        $dto->setImage($course->getImage());
        $dto->setDescription($course->getDescription());
        $dto->setUserId($course->getUserId());
        $dto->setTechnologies($this->technologyService->getAll());
        return $dto;
    }


}