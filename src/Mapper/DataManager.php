<?php

namespace App\Mapper;

class DataManager
{
    private $object;

    public function prepare($object)
    {
        $this->object = $object;

        return print_r($object);
        
    }

    public function enter()
    {
        $this->object;
    }

    public function Pdo()
    {

    }

    public function Txt()
    {

    }

}