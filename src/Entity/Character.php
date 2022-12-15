<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 * @ORM\Table(name="`character`")
 */
class Character
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="integer")
     */
    private $lvl;

    /**
     * @ORM\Column(type="integer")
     */
    private $exp;

    /**
     * @ORM\Column(type="integer")
     */
    private $str;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $weapon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Armor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getLvl(): ?int
    {
        return $this->lvl;
    }

    public function setLvl(int $lvl): self
    {
        $this->lvl = $lvl;

        return $this;
    }

    public function getExp(): ?int
    {
        return $this->exp;
    }

    public function setExp(int $exp): self
    {
        $this->exp = $exp;

        return $this;
    }

    public function getStr(): ?int
    {
        return $this->str;
    }

    public function setStr(int $str): self
    {
        $this->str = $str;

        return $this;
    }

    public function getWeapon(): ?string
    {
        return $this->weapon;
    }

    public function setWeapon(string $weapon): self
    {
        $this->weapon = $weapon;

        return $this;
    }

    public function getArmor(): ?string
    {
        return $this->Armor;
    }

    public function setArmor(string $Armor): self
    {
        $this->Armor = $Armor;

        return $this;
    }
}
