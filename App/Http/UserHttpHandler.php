<?php

namespace App\Http;

use App\Data\UserDTO;
use App\Data\UserEditDTO;
use App\Service\CourseServiceInterface;
use App\Service\UserServiceInterface;
use Core\DataBinderInterface;
use Core\TemplateInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * @var CourseServiceInterface
     */
    private $coursesService;

    public function __construct(
        TemplateInterface $template,
        DataBinderInterface $dataBinder,
        UserServiceInterface $userService,
        CourseServiceInterface $coursesService)
    {
        parent::__construct($template, $dataBinder);
        $this->userService = $userService;
        $this->coursesService = $coursesService;
    }


    public function index()
    {
        $this->render("home/index");
    }

    /**
     * @throws
     */
    public function profile()
    {
        if (!$this->userService->isLogged()) {
            $this->redirect("login.php");
        }
        $courses =$this->coursesService->getByUserId($this->userService->currentUser()->getId());

        try {

            $this->render("users/profile",$courses);
        }catch (\Exception $ex){
            $this->render("users/profile",$courses,[$ex->getMessage()]);
        }
    }

    public function login(array $formData = [])
    {
        $username = "";
        if (isset($formData['login'])) {
            $this->handleLoginProcess($formData);
        } else {
            if(isset($_SESSION['username'])){
                $username = $_SESSION['username'];
            }
            $this->render("users/login",
                $username === "" ? "" : $username);
        }
    }

    public function register(array $formData = [])
    {
        if (isset($formData['register'])) {
            $this->handleRegisterProcess($formData);
        } else {
            $this->render("users/register");
        }
    }

    private function handleRegisterProcess($formData)
    {
        try {
            /** @var UserDTO $user */
            $user = $this->dataBinder->bind($formData, UserDTO::class);
            $this->userService->register($user, $formData['confirm_password']);
            $_SESSION['username'] =$this->userService->currentUser()->getUsername();
            $this->redirect("login.php");
        } catch (\Exception $ex) {
            $this->render("users/register", null,
                [$ex->getMessage()]);
        }
    }

    private function handleLoginProcess($formData)
    {
        try {
            $user = $this->userService->login($formData['username'], $formData['password']);

            if (null !== $user) {
                $_SESSION['id'] = $user->getId();
                $this->redirect("profile.php");
            }
        } catch (\Exception $ex) {
            $this->render("users/login", null,
                [$ex->getMessage()]);
        }
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
            $this->render("users/edit", $dto);
        }
    }

    /**
     * @param array $formData
     * @throws \Exception
     */
    private function handleEditProcess(array $formData)
    {
        try {
            /** @var UserEditDTO $dto */
            $dto = $this->dataBinder->bind($formData, UserEditDTO::class);
            $dto->setId($_GET['id']);
            $this->userService->edit($dto,$formData['confirm_password']);
            $_SESSION['username'] = $dto->getUsername();
            $this->redirect("profile.php");
        } catch (\Exception $ex) {
            $dto = $this->getEditDTO();
            $this->render("users/edit", $dto,
                [$ex->getMessage()]);
        }
    }

    /**
     * @return UserDTO
     * @throws \Exception
     */
    private function getEditDTO(): UserDTO
    {
        $user = $this->userService->currentUser();

        $dto = new UserDTO();
        $dto->setId( $user->getId());
        $dto->setUsername( $user->getUsername());
        $dto->setEmail( $user->getEmail());

        return $dto;
    }

}