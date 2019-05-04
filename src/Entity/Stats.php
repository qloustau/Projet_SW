<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatsRepository")
 */
class Stats
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $IDinGame;

    /**
     * @ORM\Column(type="integer")
     */
    private $HealthPoints;

    /**
     * @ORM\Column(type="integer")
     */
    private $Level;

    /**
     * @ORM\Column(type="integer")
     */
    private $Grade;

    /**
     * @ORM\Column(type="integer")
     */
    private $Attack;

    /**
     * @ORM\Column(type="integer")
     */
    private $Defense;

    /**
     * @ORM\Column(type="integer")
     */
    private $Speed;

    /**
     * @ORM\Column(type="integer")
     */
    private $CriticalRate;

    /**
     * @ORM\Column(type="integer")
     */
    private $CriticalDamage;

    /**
     * @ORM\Column(type="integer")
     */
    private $Resistance;

    /**
     * @ORM\Column(type="integer")
     */
    private $Accuracy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Mob", inversedBy="Stats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mobs;

    public function __construct()
    {
    }

    public function __toString() {
        return (string)$this->IDinGame;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDinGame(): ?int
    {
        return $this->IDinGame;
    }

    public function setIDinGame(int $IDinGame): self
    {
        $this->IDinGame = $IDinGame;

        return $this;
    }

    public function getHealthPoints(): ?int
    {
        return $this->HealthPoints;
    }

    public function setHealthPoints(int $HealthPoints): self
    {
        $this->HealthPoints = $HealthPoints;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->Level;
    }

    public function setLevel(int $Level): self
    {
        $this->Level = $Level;

        return $this;
    }

    public function getGrade(): ?int
    {
        return $this->Grade;
    }

    public function setGrade(int $Grade): self
    {
        $this->Grade = $Grade;

        return $this;
    }

    public function getAttack(): ?int
    {
        return $this->Attack;
    }

    public function setAttack(int $Attack): self
    {
        $this->Attack = $Attack;

        return $this;
    }

    public function getDefense(): ?int
    {
        return $this->Defense;
    }

    public function setDefense(int $Defense): self
    {
        $this->Defense = $Defense;

        return $this;
    }

    public function getSpeed(): ?int
    {
        return $this->Speed;
    }

    public function setSpeed(int $Speed): self
    {
        $this->Speed = $Speed;

        return $this;
    }

    public function getCriticalRate(): ?int
    {
        return $this->CriticalRate;
    }

    public function setCriticalRate(int $CriticalRate): self
    {
        $this->CriticalRate = $CriticalRate;

        return $this;
    }

    public function getCriticalDamage(): ?int
    {
        return $this->CriticalDamage;
    }

    public function setCriticalDamage(int $CriticalDamage): self
    {
        $this->CriticalDamage = $CriticalDamage;

        return $this;
    }

    public function getResistance(): ?int
    {
        return $this->Resistance;
    }

    public function setResistance(int $Resistance): self
    {
        $this->Resistance = $Resistance;

        return $this;
    }

    public function getAccuracy(): ?int
    {
        return $this->Accuracy;
    }

    public function setAccuracy(int $Accuracy): self
    {
        $this->Accuracy = $Accuracy;

        return $this;
    }

    public function getMobs(): ?Mob
    {
        return $this->mobs;
    }

    public function setMobs(?Mob $mobs): self
    {
        $this->mobs = $mobs;

        return $this;
    }
}
