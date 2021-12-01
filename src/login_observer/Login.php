<?php

namespace App\login_observer;

use App\login_observer\Observable;

class Login implements Observable
{
    const LOGIN_UNKNOWN = 1;
    const LOGIN_WRONG_PASS = 2;
    const LOGIN_ACCESS = 1;

    private $storage;
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

}