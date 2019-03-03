<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MobRepository")
 */
class Mob
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Family;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Attribute", mappedBy="mob")
     */
    private $Attribute;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Class;

    /**
     * @ORM\Column(type="integer")
     */
    private $Grade;

    /**
     * @ORM\Column(type="integer")
     */
    private $HealthPoints;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Skill", inversedBy="mobs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Skills;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rune", inversedBy="mobs")
     */
    private $Runes;

    /**
     * @ORM\Column(type="integer")
     */
    private $Level;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Team", mappedBy="Mobs")
     */
    private $teams;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account", inversedBy="Mobs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $account;

    public function __construct()
    {
        $this->Attribute = new ArrayCollection();
        $this->teams = new ArrayCollection();
    }

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

    public function getFamily(): ?string
    {
        return $this->Family;
    }

    public function setFamily(string $Family): self
    {
        $this->Family = $Family;

        return $this;
    }

    /**
     * @return Collection|Attribute[]
     */
    public function getAttribute(): Collection
    {
        return $this->Attribute;
    }

    public function addAttribute(Attribute $attribute): self
    {
        if (!$this->Attribute->contains($attribute)) {
            $this->Attribute[] = $attribute;
            $attribute->setMob($this);
        }

        return $this;
    }

    public function removeAttribute(Attribute $attribute): self
    {
        if ($this->Attribute->contains($attribute)) {
            $this->Attribute->removeElement($attribute);
            // set the owning side to null (unless already changed)
            if ($attribute->getMob() === $this) {
                $attribute->setMob(null);
            }
        }

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->Class;
    }

    public function setClass(string $Class): self
    {
        $this->Class = $Class;

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

    public function getHealthPoints(): ?int
    {
        return $this->HealthPoints;
    }

    public function setHealthPoints(int $HealthPoints): self
    {
        $this->HealthPoints = $HealthPoints;

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

    public function getSkills(): ?Skill
    {
        return $this->Skills;
    }

    public function setSkills(?Skill $Skills): self
    {
        $this->Skills = $Skills;

        return $this;
    }

    public function getRunes(): ?Rune
    {
        return $this->Runes;
    }

    public function setRunes(?Rune $Runes): self
    {
        $this->Runes = $Runes;

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

    /**
     * @return Collection|Team[]
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams[] = $team;
            $team->addMob($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->teams->contains($team)) {
            $this->teams->removeElement($team);
            $team->removeMob($this);
        }

        return $this;
    }

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount(?Account $account): self
    {
        $this->account = $account;

        return $this;
    }
}
