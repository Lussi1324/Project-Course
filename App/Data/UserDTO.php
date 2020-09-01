<?php

namespace App\Data;


class UserDTO
{
    private const USERNAME_MIN_LENGTH = 4;
    private const USERNAME_MAX_LENGTH = 255;

    private const PASSWORD_MIN_LENGTH = 4;
    private const PASSWORD_MAX_LENGTH = 255;

    private const EMAIL_MIN_LENGTH = 4;
    private const EMAIL_MAX_LENGTH = 255;

    private $id;
    private $username;
    private $password;
    private $email;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): UserDTO
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param $username
     * @return UserDTO
     * @throws \Exception
     */
    public function setUsername($username): UserDTO
    {
        DTOValidator::validate(self::USERNAME_MIN_LENGTH, self::USERNAME_MAX_LENGTH,
            $username, "text", "Username");
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     * @return UserDTO
     * @throws \Exception
     */
    public function setPassword($password): UserDTO
    {
        DTOValidator::validate(self::PASSWORD_MIN_LENGTH, self::PASSWORD_MAX_LENGTH,
            $password, "password", " New Password");
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     * @return UserDTO
     * @throws \Exception
     */
    public function setEmail($email): UserDTO
    {
        DTOValidator::validate(self::EMAIL_MIN_LENGTH, self::EMAIL_MAX_LENGTH,
            $email, "email", "Email");
        $this->email = $email;
        return $this;
    }








}