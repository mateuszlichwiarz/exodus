<?php

namespace App\Tests\SerializeTests;

use PHPUnit\Framework\TestCase;

use App\Serialize\UserJson;

use App\model\User;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertObjectEquals;


use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class UserJsonTest extends TestCase
{

    public function testDeserializing(): void
    {

        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $data = '{"id":0,"type":"adm","username":"Mateusz","password":"ostatnichujpolski"}';

        $object = $serializer->deserialize($data, User::class, 'json');

        $this->assertIsObject($object);
    }

    public function testSerializingJson(): void
    {
        $json = new UserJson();
        $json->intoJson();
        $jsonContent = $json->getJson();

        $userMock = '{"id":0,"type":"adm","username":"Mateusz","password":"ostatnichujpolski"}';

        $this->assertJsonStringEqualsJsonString($userMock,$jsonContent);
    }
    
    public function testLoadJson(): void
    {
        $userInJsonMock = '{"id":1,"type":"usr","username":"Patryk","password":"atykatolik"}';
        
        $json = new UserJson();
        $json->loadJson($userInJsonMock);

        $json = $json->getJson();

        $this->assertEquals($userInJsonMock,$json);

    }


    public function testDeserializingJsonIsObject(): void
    {

        $userInJsonMock = '{"id":2,"type":"own","username":"Martyna","password":"czychujemjestes"}';

        $json = new UserJson();
        $json->loadJson($userInJsonMock);

        $user = $json->getObject();

        $this->assertIsObject($user);

    }

    public function testDeserializingJsonEquals(): void
    {

        $userInJsonMock = '{"id":3,"type":"adm","username":"Karol","password":"kancelariaprawna"}';

        $json = new UserJson();
        $json->loadJson($userInJsonMock);

        $user = $json->getObject();

        $userProp = new User();
        $userProp->setId('3');
        $userProp->setType('adm');
        $userProp->setUsername('Karol');
        $userProp->setPassword('kancelariaprawna');

        $this->assertObjectEquals($user,$userProp);

    }

    //EXPERIMENT IDEAS
    /*
    public function testDeserializingJson(): void
    {
        $user = new User('{"id":1,"type":"usr","username":"Martyna","password":"jebacsad"}');
        $user->save();
        $user->execute();

        $jsonContent = $json->getObject();
        
        $userMock;
    }

    public function testUser(): void
    {
        $user = new User();
        $user->setId(0);
        $user->setUsername('chuj');

        $serializer = new Serializer();
        $user->serialize('xml');
    }


    */

}