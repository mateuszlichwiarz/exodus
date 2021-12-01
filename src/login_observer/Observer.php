<?php

namespace App\login_observer;

interface Observer
{
    public function update(Observable $observable);
}