<?php

namespace App\DataController\Writer;

abstract class UserEncoder
{
    abstract public function encode($value,$id);
}