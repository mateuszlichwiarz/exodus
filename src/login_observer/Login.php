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