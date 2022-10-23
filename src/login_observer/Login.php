<?php

namespace App\login_observer;

use App\login_observer\Observable;
use App\Core\Engine;

class Login implements Observable
{
    const LOGIN_USER_UNKNOWN = 1;
    const LOGIN_WRONG_PASS = 2;
    const LOGIN_ACCESS = 1;

    private $status = [];
    private $observers = [];

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }
    
    public function detach(Observer $observer)
    {
        $this->observers = array_filter(
            $this->observers,
            function ($a) use ($observer) {
                return (! ($a === $observer ));
            }
        );
    }

    public function notify()
    {
        foreach($this->observers as $obs)
        {
            $obs->update($this);
        }
    }

    public function handleLogin(string $userName, string $password, string $ip): bool
    {   
        $ip = Engine::getIp();
        $params = Engine::getParams();

        $isvalid = false;
        if($userName == $params['userName'] && $password == $params['password'])
        {
            $this->setStatus(self::LOGIN_ACCESS, $userName, $ip);
                $isvalid = true;
        }
        elseif($userName == $params['userName'])
        {
            $this->setStatus(self::LOGIN_USER_UNKNOWN, $userName, $ip);
                $isvalid = false;
        }
        elseif($password == $params['password'])
        {
            $this->setStatus(self::LOGIN_WRONG_PASS, $password, $ip);
                $isvalid = false;
        }

        $this->notify();
        return $isvalid;
    }

    private function setStatus(int $status, string $user, string $ip)
    {
        $this->status = [$status, $user, $ip];
    }

    public function getStatus(): array
    {
        return $this->status;
    }

}

//jak wróce to trzeba zrobić wywołanie login_observer i spróbować to wykorzystać