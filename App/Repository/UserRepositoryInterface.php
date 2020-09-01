<?php

namespace App\Repository;

use App\Data\UserDTO;
use App\Data\UserEditDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $userDTO) : bool;
    public function edit(UserEditDTO $userEditDTO);
    public function findOneByUsername(string $username) : ?UserDTO;
    public function findOneById(int $id) : ?UserDTO;

    /**
     * @return \Generator|UserDTO[]
     */
    public function findAll() : \Generator;
}