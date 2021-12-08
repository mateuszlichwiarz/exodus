<?php

namespace App\login_observer;

use App\login_observer\LoginObserver;

class GeneralLogger extends LoginObserver
{
    public function doUpdate(Login $login)
    {
        $status = $login->getStatus();
        print __CLASS__ . ":    add data to diary";
    }
}