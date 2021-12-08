<?php

namespace App\login_observer;

use App\login_observer\Observer;
use App\login_observer\Observable;
use App\login_observer\Login;

abstract class LoginObserver implements Observer
{
    private $login;
    public function __construct(Login $login)
    {
        $this->login = $login;
        $login->attach($this);
    }

    public function update(Observable $observable)
    {
        if($observable === $this->login) {
            $this->doUpdate($observable);
        }
    }

    abstract public function doUpdate(Login $login);
}