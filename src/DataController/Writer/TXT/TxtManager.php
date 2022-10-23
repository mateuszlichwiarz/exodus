<?php

namespace App\DataController\Writer\TXT;

use App\DataController\Writer\DataManager;
use App\DataController\Writer\UserDecoder;
use App\DataController\Writer\UserEncoder;

use App\DataController\Writer\TXT\TxtUserEncoder;
use App\DataController\Writer\TXT\TxtUserDecoder;


class TxtManager extends DataManager
{
    public function setArray($array): array
    {
        return $array;
    }

    public function getUserEncoder(): UserEncoder
    {
        return new TxtUserEncoder();
    }

    public function getUserDecoder(): UserDecoder
    {
        return new TxtUserDecoder();
    }
}