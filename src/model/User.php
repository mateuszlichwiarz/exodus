<?php

namespace App\model;

//use \Format_class;

class User
{
    private int $id;
    private string $type;
    private string $username;
    private string $password;


    //customize equals
    public function asString(): string
    {
        return $this->password;
    }

    public function equals(self $other): bool
    {
        return $this->asString() === $other->asString();
    }

    //Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    //Setters
    public function setId(int $id)
    {
        $this->id=$id;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

}