<?php

namespace App\login_observer;

use App\login_observer\Observer;
use App\login_obverver\Observable;

class LoginAnalytics implements Observer
{
    public function update(Observable $observable)
    {
        $status = $observable->getStatus();
        print __CLASS__ . ":    takes action based on status/n";
    }
}