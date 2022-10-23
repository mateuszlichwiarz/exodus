<?php

namespace App\DataController\Writer\TXT;

use App\DataController\Writer\UserDecoder;

class TxtUserDecoder extends UserDecoder
{
    public function decode()
    {
        $file = fopen("data.txt", "r");
        $value = fread($file,filesize("data.txt"));
        fclose($file);

        return $value;
    }

    public function read($value)
    {
        $value = 'name:martyna
                  password:pusia
                  ';
        
    }
}