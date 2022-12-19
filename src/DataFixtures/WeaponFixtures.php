<?php

namespace App\DataFixtures;

use App\Entity\Weapon;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WeaponFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $weapon = new Weapon();
        $weapon->setName('fists');
        $weapon->setDmg(1);
        $weapon->setType('blunt');
        $weapon->setReq(0);

         $manager->persist($weapon);

        $manager->flush();
    }
}
