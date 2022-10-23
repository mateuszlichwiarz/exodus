<?php

namespace App\Tests\UserTests;

use PHPUnit\Framework\TestCase;

use App\Mapper\DataManager;
use App\User\User;

class UserTest extends TestCase
{
    public function testUser(): void
    {
        $user = new User();
        $user->setId('0');
        $user->setType('admin');
        $user->setUsername('Mateusz');
        $user->setPassword('kutas');



        $this->assertIsObject($user);
    }

    public function testNewUser(): void
    {
        $dataManager = new DataManger();

        $user = new User();
        $user->setId('0');
        $user->setType('admin');
        $user->setUsername('Mateusz');
        $user->setPassword('kutas');

        $dataManager->Doctrine();
        $dataManager->prepare();
        $dataManager->enter();
        //$dataManager->Yaml();
        //$dataManager->Pdo();
        //$dataManager->Xml();
        $dataManager->Doctrine();
    }

    public function testPrepare(): void
    {
        $dataManager = new DataManager();
    }
}