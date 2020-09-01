<?php

namespace App\Data;


class UserEditDTO extends  UserDTO
{
    private $oldpassword;

    /**
     * @return mixed
     */
    public function getOldpassword()
    {
        return $this->oldpassword;
    }

    /**
     * @param mixed $oldpassword
     */
    public function setOldpassword($oldpassword): void
    {
        $this->oldpassword = $oldpassword;
    }




}
