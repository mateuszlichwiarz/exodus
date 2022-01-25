<?php

namespace App\login_observer;

use App\login_observer\LoginObserver;

use App\login_observer\Login;

class SecurityMonitor extends LoginObserver
{
    public function doUpdate(Login $login)
    {
        $status = $login->getStatus();
        if($status[0] == Login::LOGIN_WRONG_PASS)
        {
            print __CLASS__ . ":    send mail to sysadmin";
        }
    }
}