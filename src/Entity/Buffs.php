<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BuffsRepository")
 */
class Buffs
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
    private $Value;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Skill", mappedBy="Buffs")
     */
    private $buffskills;

    /**
     * @ORM\Column(type="integer")
     */
    private $StatEffect;

    public function __construct()
    {
        $this->buffskills = new ArrayCollection();
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

    public function getValue(): ?int
    {
        return $this->Value;
    }

    public function setValue(int $Value): self
    {
        $this->Value = $Value;

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getBuffskills(): Collection
    {
        return $this->buffskills;
    }

    public function addBuffskill(Skill $buffskill): self
    {
        if (!$this->buffskills->contains($buffskill)) {
            $this->buffskills[] = $buffskill;
            $buffskill->addBuff($this);
        }

        return $this;
    }

    public function removeBuffskill(Skill $buffskill): self
    {
        if ($this->buffskills->contains($buffskill)) {
            $this->buffskills->removeElement($buffskill);
            $buffskill->removeBuff($this);
        }

        return $this;
    }

    public function getStatEffect(): ?int
    {
        return $this->StatEffect;
    }

    public function setStatEffect(int $StatEffect): self
    {
        $this->StatEffect = $StatEffect;

        return $this;
    }
}
