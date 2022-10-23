<?php

namespace App\Mapper;

use App\Mapper\DomainObject;
use App\Mapper\Base;

class User extends DomainObject
{
    private $name;
    public function __construct(int $id, string $name)
    {
        $this->name = $name;
        parent::__construct($id);
    }

    public function setName(string $name)
    {
        $this->name = $name;
        $this->markDirty();
    }

    public function getName(): string
    {
        return $this->name;
    }
}