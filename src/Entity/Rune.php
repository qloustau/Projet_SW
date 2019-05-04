<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RuneRepository")
 */
class Rune
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
    private $Slot;

    /**
     * @ORM\Column(type="integer")
     */
    private $InnetGrade;

    /**
     * @ORM\Column(type="integer")
     */
    private $Grade;

    /**
     * @ORM\Column(type="integer")
     */
    private $IDSet;

    /**
     * @ORM\Column(type="integer")
     */
    private $Rank;

    /**
     * @ORM\Column(type="integer")
     */
    private $UpgradeCurrent;

    /**
     * @ORM\Column(type="array")
     */
    private $MainStat = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $InnetStat = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $IdsSubstats = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $ValuesSubstats = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $ValuesGrindstone = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $Gemstone = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Mob", mappedBy="Runes")
     */
    private $mobs;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account", inversedBy="Runes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $account;

    public function __construct()
    {
        $this->mobs = new ArrayCollection();
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

    public function getSlot(): ?int
    {
        return $this->Slot;
    }

    public function setSlot(int $Slot): self
    {
        $this->Slot = $Slot;

        return $this;
    }

    public function getInnetGrade(): ?int
    {
        return $this->InnetGrade;
    }

    public function setInnetGrade(int $InnetGrade): self
    {
        $this->InnetGrade = $InnetGrade;

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

    public function getIDSet(): ?int
    {
        return $this->IDSet;
    }

    public function setIDSet(int $IDSet): self
    {
        $this->IDSet = $IDSet;

        return $this;
    }

    public function getRank(): ?int
    {
        return $this->Rank;
    }

    public function setRank(int $Rank): self
    {
        $this->Rank = $Rank;

        return $this;
    }

    public function getUpgradeCurrent(): ?int
    {
        return $this->UpgradeCurrent;
    }

    public function setUpgradeCurrent(int $UpgradeCurrent): self
    {
        $this->UpgradeCurrent = $UpgradeCurrent;

        return $this;
    }

    public function getMainStat(): ?array
    {
        return $this->MainStat;
    }

    public function setMainStat(array $MainStat): self
    {
        $this->MainStat = $MainStat;

        return $this;
    }

    public function getInnetStat(): ?array
    {
        return $this->InnetStat;
    }

    public function setInnetStat(?array $InnetStat): self
    {
        $this->InnetStat = $InnetStat;

        return $this;
    }

    public function getIdsSubstats(): ?array
    {
        return $this->IdsSubstats;
    }

    public function setIdsSubstats(?array $IdsSubstats): self
    {
        $this->IdsSubstats = $IdsSubstats;

        return $this;
    }

    public function getValuesSubstats(): ?array
    {
        return $this->ValuesSubstats;
    }

    public function setValuesSubstats(?array $ValuesSubstats): self
    {
        $this->ValuesSubstats = $ValuesSubstats;

        return $this;
    }

    public function getValuesGrindstone(): ?array
    {
        return $this->ValuesGrindstone;
    }

    public function setValuesGrindstone(?array $ValuesGrindstone): self
    {
        $this->ValuesGrindstone = $ValuesGrindstone;

        return $this;
    }

    public function getGemstone(): ?array
    {
        return $this->Gemstone;
    }

    public function setGemstone(?array $Gemstone): self
    {
        $this->Gemstone = $Gemstone;

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
            $mob->setRunes($this);
        }

        return $this;
    }

    public function removeMob(Mob $mob): self
    {
        if ($this->mobs->contains($mob)) {
            $this->mobs->removeElement($mob);
            // set the owning side to null (unless already changed)
            if ($mob->getRunes() === $this) {
                $mob->setRunes(null);
            }
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
