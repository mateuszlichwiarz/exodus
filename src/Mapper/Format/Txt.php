<?php

namespace App\Mapper\Format;

class Txt
{
    private $object;
    private $array;

    public function setObject($object)
    {
        $this->object = $object;
    }

    public function getObject()
    {
        return $this->object;
    }

    private function prepare()
    {
        $object = $this->object;

        $array = (array) $object;

    }

}