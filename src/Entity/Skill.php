<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillRepository")
 */
class Skill
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="integer")
     */
    private $SkillUp;

    /**
     * @ORM\ManyToMany(targetEntity="Buffs", inversedBy="buffskills")
     */
    private $Buffs;

    /**
     * @ORM\ManyToMany(targetEntity="Debuffs", inversedBy="debuffskills")
     */
    private $Debuffs;

    /**
     * @ORM\Column(type="boolean")
     */
    private $State;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $LeaderSkill = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Mob", mappedBy="Skills")
     */
    private $mobs;

    /**
     * @ORM\Column(type="integer")
     */
    private $Devilmon;

    public function __construct()
    {
        $this->mobs = new ArrayCollection();
        $this->Buffs = new ArrayCollection();
        $this->Debuffs = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getSkillUp(): ?int
    {
        return $this->SkillUp;
    }

    public function setSkillUp(int $SkillUp): self
    {
        $this->SkillUp = $SkillUp;

        return $this;
    }

    /**
     * @return Collection|Buffs[]
     */
    public function getBuffs(): Collection
    {
        return $this->Buffs;
    }

    public function addBuff(Buffs $buff): self
    {
        if (!$this->Buffs->contains($buff)) {
            $this->Buffs[] = $buff;
        }

        return $this;
    }

    public function removeBuff(Buffs $buff): self
    {
        if ($this->Buffs->contains($buff)) {
            $this->Buffs->removeElement($buff);
        }

        return $this;
    }

    /**
     * @return Collection|Debuffs[]
     */
    public function getDebuffs(): Collection
    {
        return $this->Debuffs;
    }

    public function addDebuff(Debuffs $debuff): self
    {
        if (!$this->Debuffs->contains($debuff)) {
            $this->Debuffs[] = $debuff;
        }

        return $this;
    }

    public function removeDebuff(Debuffs $debuff): self
    {
        if ($this->Debuffs->contains($debuff)) {
            $this->Debuffs->removeElement($debuff);
        }

        return $this;
    }

    public function getState(): ?bool
    {
        return $this->State;
    }

    public function setState(bool $State): self
    {
        $this->State = $State;

        return $this;
    }

    public function getLeaderSkill(): ?array
    {
        return $this->LeaderSkill;
    }

    public function setLeaderSkill(?array $LeaderSkill): self
    {
        $this->LeaderSkill = $LeaderSkill;

        return $this;
    }

    /**
     * @return Collection|Mob[]
     */
    public function getMobs(): Collection
    {
        return $this->mobs;
    }

    public function addMob(Mob $mob): self
    {
        if (!$this->mobs->contains($mob)) {
            $this->mobs[] = $mob;
            $mob->setSkills($this);
        }

        return $this;
    }

    public function removeMob(Mob $mob): self
    {
        if ($this->mobs->contains($mob)) {
            $this->mobs->removeElement($mob);
            // set the owning side to null (unless already changed)
            if ($mob->getSkills() === $this) {
                $mob->setSkills(null);
            }
        }

        return $this;
    }

    public function getDevilmon(): ?int
    {
        return $this->Devilmon;
    }

    public function setDevilmon(int $Devilmon): self
    {
        $this->Devilmon = $Devilmon;

        return $this;
    }
}
