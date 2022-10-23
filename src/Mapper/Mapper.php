<?php

namespace App\Mapper;

use App\Mapper\Registry\Registry;

abstract class Mapper
{
    public function __construct()
    {
        
    }

    public function find(int $id): DomainObject
    {
        $row = [];
        if(! is_array($row)) {
            return null;
        }

        $object = $this->createObject($row);
        return $object;
    }

    public function createObject(array $raw): DomainObject
    {
        $object = $this->doCreateObject($raw);
        return $object;
    }

    abstract protected function doCreateObject(array $raw): DomainObject;

}