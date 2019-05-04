<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OtherEffectRepository")
 */
class OtherEffect
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Skill", mappedBy="OtherEffect")
     */
    private $othereffectskills;

    public function __construct()
    {
        $this->othereffectskills = new ArrayCollection();
    }

    public function __toString() {
        return $this->Name;
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

    /**
     * @return Collection|Skill[]
     */
    public function getOtherEffectskills(): Collection
    {
        return $this->othereffectskills;
    }

    public function addOtherEffectskills(Skill $othereffectskills): self
    {
        if (!$this->othereffectskills->contains($othereffectskills)) {
            $this->othereffectskills[] = $othereffectskills;
            $othereffectskills->addOtherEffect($this);
        }

        return $this;
    }

    public function removeOtherEffectskills(Skill $othereffectskills): self
    {
        if ($this->othereffectskills->contains($othereffectskills)) {
            $this->othereffectskills->removeElement($othereffectskills);
            $othereffectskills->removeOtherEffect($this);
        }

        return $this;
    }
}
