<?php

namespace App\DataController\Writer\TXT;

use Symfony\Component\Finder\Finder;

class Processor
{
    public function findFile($nickname)
    {
        $files = new Finder();
        $files->files()->in('../public/dataTXT')->name($nickname.'.txt');

        return $files;

    }


}