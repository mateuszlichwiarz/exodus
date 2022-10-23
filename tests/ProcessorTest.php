<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use App\DataController\Writer\TXT\Processor;

class ProcessorTest extends TestCase
{

    public function testProcessor(): void
    {
        $files = new Processor();
        $file = $files->findFile('martyna');

        $this->assertIsObject($file);

        //$this->assertSame('0.txt',$file);
    }
}
