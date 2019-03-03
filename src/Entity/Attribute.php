<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AttributeRepository")
 */
class Attribute
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Attribute", inversedBy="Advantage")
     */
    private $advattribute;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Attribute", mappedBy="advattribute")
     */
    private $Advantage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Attribute", inversedBy="disadvattribute")
     */
    private $Disadvantage;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Attribute", mappedBy="Disadvantage")
     */
    private $disadvattribute;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Mob", inversedBy="Attribute")
     */
    private $mob;

    public function __construct()
    {
        $this->Advantage = new ArrayCollection();
        $this->disadvattribute = new ArrayCollection();
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

    public function getAdvattribute(): ?self
    {
        return $this->advattribute;
    }

    public function setAdvattribute(?self $advattribute): self
    {
        $this->advattribute = $advattribute;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getAdvantage(): Collection
    {
        return $this->Advantage;
    }

    public function addAdvantage(self $advantage): self
    {
        if (!$this->Advantage->contains($advantage)) {
            $this->Advantage[] = $advantage;
            $advantage->setAdvattribute($this);
        }

        return $this;
    }

    public function removeAdvantage(self $advantage): self
    {
        if ($this->Advantage->contains($advantage)) {
            $this->Advantage->removeElement($advantage);
            // set the owning side to null (unless already changed)
            if ($advantage->getAdvattribute() === $this) {
                $advantage->setAdvattribute(null);
            }
        }

        return $this;
    }

    public function getDisadvantage(): ?self
    {
        return $this->Disadvantage;
    }

    public function setDisadvantage(?self $Disadvantage): self
    {
        $this->Disadvantage = $Disadvantage;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getDisadvattribute(): Collection
    {
        return $this->disadvattribute;
    }

    public function addDisadvattribute(self $disadvattribute): self
    {
        if (!$this->disadvattribute->contains($disadvattribute)) {
            $this->disadvattribute[] = $disadvattribute;
            $disadvattribute->setDisadvantage($this);
        }

        return $this;
    }

    public function removeDisadvattribute(self $disadvattribute): self
    {
        if ($this->disadvattribute->contains($disadvattribute)) {
            $this->disadvattribute->removeElement($disadvattribute);
            // set the owning side to null (unless already changed)
            if ($disadvattribute->getDisadvantage() === $this) {
                $disadvattribute->setDisadvantage(null);
            }
        }

        return $this;
    }

    public function getMob(): ?Mob
    {
        return $this->mob;
    }

    public function setMob(?Mob $mob): self
    {
        $this->mob = $mob;

        return $this;
    }
}
