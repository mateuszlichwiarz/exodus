<?php

namespace App\Sign_in;

use App\User\User;

use App\DataController\Writer\TXT\TxtManager;
//use App\DataController\Writer\TXT\TxtEncoder;

class SignManager
{
    public function __construct(User $user)
    {
        $this->user = $user;
        $userId    = $user->getId();
        $userType  = $user->getType();
        $username  = $user->getUsername();
        $userPaswd = $user->getPassword();
    }

//trzeba zastanowić się nad zapisem danych w txt
//są dwie możliwości, każdy user osobno, id jako nazwa
//lub też kilka userów w jednym pliku
//można obie metody wypróbować
//to jeden dzień roboty jeśli ktoś się nie bedzie opierdalał
//da się szukać po nazwie za pomocą sortowania w php
//szyfrowanie danych można zrobić
//interpreter

//obsługa plików
//lepiej zrobić koordynat/xddd/ plików w osobnej klasie
//kawał zaawansowanego sprzętu


    public function CreateUser()
    {
        $id = 0;
        $id = 1;
        $id = 2;
        $manager = new TxtManager();
        $manager->getUserEncoder()
                ->encode(
                    $this->username,
                    $this->userId
                );
    }

    public function SignIn()
    {

    }


}