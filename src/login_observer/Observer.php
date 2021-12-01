<?php

namespace App\login_observer;

use App\login_observer\Observable;

interface Observer
{
    public function update(Observable $observable);
}