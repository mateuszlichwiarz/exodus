<?php

namespace App\Serialize;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

use App\model\User;

class UserJson
{
    //private $serializer;
    
    private $data;

    static public function init()
    {
        $encoders = [new XmlEncoder, new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        return $serializer;
    }

    public function intoJson()
    {
        $serializer = self::init();

        $user = new User();
        $user->setId(0);
        $user->setUsername('Mateusz');
        $user->setType('adm');
        $user->setPassword('ostatnichujpolski');

        $jsonContent = $serializer->serialize($user, 'json');
        
        $this->data = $jsonContent;
    }

    public function getJson()
    {

        return $this->data;
    }

    public function loadJson($data)
    {
        $this->data = $data;
    }

    public function getObject()
    {
        $serializer = self::init();

        $user = $serializer->deserialize($this->data, User::class, 'json');

        return $user;
    }
}