<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use App\Mapper\User;

class UserTest extends TestCase
{
    public function testFinderInBase(): void
    {
        $base = new User('martyna');
        $result = $base->getBase();

        $this->assertEquals($result, 'martyna.txt');
    }
}