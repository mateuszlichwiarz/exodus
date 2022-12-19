<?php

namespace App\DataFixtures;

use App\Entity\Armor;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArmorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $weapon = new Armor();
        $weapon->setName('pantaloons');
        $weapon->setDef(1);
        $weapon->setReq(0);

         $manager->persist($weapon);

        $manager->flush();
    }
}
