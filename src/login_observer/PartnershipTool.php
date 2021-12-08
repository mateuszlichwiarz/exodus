<?php

namespace App\login_observer;

use App\login_observer\LoginObserver;

class PartnershipTool extends LoginObserver
{
    public function doUpdate(Login $login)
    {
        $status = $login->getStatus();
        
        print __CLASS__ . ":    set cookie for allowed ip";
    }
}