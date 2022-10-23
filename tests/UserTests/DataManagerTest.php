<?php

namespace App\Tests\UserTests;

use PHPUnit\Framework\TestCase;

use App\Mapper\DataManager;
use App\User\User;

class DataManagerTest extends TestCase
{
    public function testPrepare(): void
    {
        $dataManager = new DataManager();
    }
}