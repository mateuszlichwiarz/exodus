<?php

namespace App\SignManager;

use App\Entity\User;

class Security
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
    
}
