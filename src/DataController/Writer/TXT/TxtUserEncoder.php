<?php

namespace App\DataController\Writer\TXT;

use App\DataController\Writer\UserEncoder;
use App\User\User;
use Symfony\Component\Finder\Finder;

class TxtUserEncoder extends UserEncoder
{
    //przydałoby się porozdzielać zadania
    public function encode($value,$id)
    {
        $data = $id.'.txt';
        if(file_exists($data))
        {
            $file = fopen($id.".txt", "w"); 
            fwrite($file,$value);
            fclose($file);
        }else
        {
            $file = fopen("1.txt", "w"); 
            fwrite($file,$value);
            fclose($file);
        }

    }

    static public function getId(User $user): int
    {
        return $user->getId();
        //wyciąganie id usera przy logowaniu/rejestracja
    }
    
    static public function checkId(User $user): int //nie wiem jeszcze czy osobno nie wrzucić
    {
        //check który nie zwraca boolean XDDDDDDDDDD

        //test
        //$user = new User();
        //$user->setId(0);
        //$user->setUsername('taba');
        //$user->setPassword('luga');

        return $id = self::getId($user);
    }

    static public function checkName()
    {
        
    }

    static public function findId($id)
    {
        //raczej ten komponent użyje do szukania
        $finder = new Finder();
        
        //fajne testy można porobić xdd
        //current directory
        $finder->files()->in('src/public/dataTXT');

        if($finder->hasResults()) 
        {
            foreach($finder as $file) 
            {
                $absoluteFilePath = $file->getRealPath();
                $fileNameWithExtension = $file->getRelativePathname();
            }
        }
        
    }

}