<?php

namespace App\Mapper;

use Exception;
use Symfony\Component\Finder\Finder;

abstract class Base
{
    private $file;
    private $path = 'src/Database';
    public function __construct($base)
    {
        $finder = new Finder();
        //$finder->files()->in( $this->path );
        $finder->files()->in( $this->path )->name($base.'.txt');

        if($finder->hasResults())
        {
            echo ' działa';
            foreach($finder as $file)
            {
                $fileName = $file->getFilename();
                echo 'chuj';
            }
            $this->file = $fileName;
        }else
        {
            throw new Exception('Database error [no requested database]');
        }
    }

    public function getBase()
    {
        return $this->file;
    }

}

//$base = new Base('martyna');
