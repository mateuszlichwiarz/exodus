<?php

namespace App\login_observer;

class Login
{
    const LOGIN_UNKNOWN = 1;
    const LOGIN_WRONG_PASS = 2;
    const LOGIN_ACCESS = 1;
    private $status = [];

    public function handleLogin(string $user,string $password, string $ip): bool 
    {
        $isvalid = false;
        
        switch(rand(1,3))
        {
            case 1:
                $this->setStatus(self::LOGIN_ACCESS, $user, $ip);
                $isvalid = true;
                break;
            case 2:
                $this->setStatus(self::LOGIN_WRONG_PASS, $user, $ip);
                $isvalid = false;
                break;
            case 3:
                $this->setStatus(self::LOGIN_UNKNOWN, $user, $ip);
                $isvalid = false;
                break;
        }
        
        return $isvalid;
    }

    private function setStatus(int $status, string $user, string $ip)
    {
        $this->status = [$status, $user, $ip];
    }

    private function getStatus(): array
    {
        return $this->status;
    }

}