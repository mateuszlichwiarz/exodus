<?php

namespace App\Mapper;


abstract class DomainObject
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCollection(string $type): Collection
    {
        return Collection::getCollection($type);
    }

    public function markDirty()
    {

    }
}