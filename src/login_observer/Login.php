<?php

namespace App\login_observer;

use App\login_observer\Observable;

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

    public function chceŻyć()
    {
        // ZABRAĆ SIĘ DO ROBOTY, jestem jebanym leniem
        // to straszne jak bardzo marnuje potencjał,
        // nie wiem co robić
        // chyba nigdy nie wyjdę z tej dziury
        // nie chce umrzeć z myślą że cały ten czas zmarnowałem
        // boje się
        // piekło jest tutaj
        // cipom jeszstem
        // nie jestem
        // ciągle coś mnie zatrzymuje
        // albo bardzo chce żeby tak było

    }

    public function handleLogin(string $user, string $password, string $ip): bool
    {
        
        if($user == true && $password == true)
        {
            $this->setStatus(self::LOGIN_ACCESS, $user, $ip);
                $isvalid = true;
        }
        elseif($user == false)
        {
            $this->setStatus(self::LOGIN_USER_UNKNOWN, $user, $ip);
                $isvalid = false;
        }
        elseif($password == false)
        {
            $this->setStatus(self::LOGIN_WRONG_PASS, $user, $ip);
                $isvalid = false;
        }

        //prawidziwe logowanie zrobić xd
        $isvalid = false;
        switch(rand(1, 3))
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
                $this->setStatus(self::LOGIN_USER_UNKNOWN, $user, $ip);
                $isvalid = false;
                break;
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