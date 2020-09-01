<?php

namespace App\Service;


use App\Data\UserDTO;
use App\Data\UserEditDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO, string $confirmPassword) : bool;
    public function login(string $username, string $password) : ?UserDTO;
    public function edit(UserEditDTO $userEditDTO, $confirmPassword);
    public function currentUser() : ?UserDTO;
    public function isLogged() : bool;

    /**
     * @return \Generator|UserDTO[]
     */
    public function getAll() : \Generator;

}