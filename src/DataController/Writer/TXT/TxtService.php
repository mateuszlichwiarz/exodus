<?php

namespace App\DataController\Writer\TXT;

use App\User\User;


class TxtService
{
    static public function checkName(User $user): bool
    {
        $id = $user->getId();

        if(file_exists($id))
        {
            return true;
        }
    }

    static public function findLast()
    {
        
        
    }
}