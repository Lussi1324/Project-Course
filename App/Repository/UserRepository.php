<?php

namespace App\Repository;


use App\Data\UserDTO;
use Core\DataBinderInterface;
use Database\DatabaseInterface;

class UserRepository extends DatabaseAbstract implements UserRepositoryInterface
{

    public function __construct(DatabaseInterface $database,
                                DataBinderInterface $dataBinder)
    {
        parent::__construct($database, $dataBinder);
    }

    public function insert(UserDTO $userDTO): bool
    {
        $this->db->query(
            "INSERT INTO users(username, password, email)
                  VALUES(?,?,?)
             "
        )->execute([
            $userDTO->getUsername(),
            $userDTO->getPassword(),
            $userDTO->getEmail()
        ]);

        return true;
    }


    public function findOneByUsername(string $username): ?UserDTO
    {
        return $this->db->query(
            "SELECT id, 
                    username, 
                    password, 
                    email
                  FROM users
                  WHERE username = ?
             "
        )->execute([$username])
            ->fetch(UserDTO::class)
            ->current();

    }

    public function findOneById(int $id): ?UserDTO
    {
        return $this->db->query(
            "SELECT id,
                    username, 
                    password, 
                    email
                  FROM users
                  WHERE id = ?
             "
        )->execute([$id])
            ->fetch(UserDTO::class)
            ->current();
    }

    /**
     * @return \Generator|UserDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query(
            "
                  SELECT id, 
                      username, 
                      password, 
                      email
                  FROM users
            "
        )->execute()
            ->fetch(UserDTO::class);
    }


}