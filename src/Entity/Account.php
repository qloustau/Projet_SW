<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AccountRepository")
 */
class Account
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $IDinGame;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Guild", inversedBy="accounts")
     */
    private $Guild;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Mob", mappedBy="account")
     */
    private $Mobs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rune", mappedBy="account")
     */
    private $Runes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Team", mappedBy="account")
     */
    private $Teams;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Event", inversedBy="accounts")
     */
    private $Events;

    public function __construct()
    {
        $this->Mobs = new ArrayCollection();
        $this->Runes = new ArrayCollection();
        $this->Teams = new ArrayCollection();
        $this->Events = new ArrayCollection();
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

    public function getIDinGame(): ?int
    {
        return $this->IDinGame;
    }

    public function setIDinGame(?int $IDinGame): self
    {
        $this->IDinGame = $IDinGame;

        return $this;
    }

    public function getGuild(): ?Guild
    {
        return $this->Guild;
    }

    public function setGuild(?Guild $Guild): self
    {
        $this->Guild = $Guild;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    /**
     * @return Collection|Mob[]
     */
    public function getMobs(): Collection
    {
        return $this->Mobs;
    }

    public function addMob(Mob $mob): self
    {
        if (!$this->Mobs->contains($mob)) {
            $this->Mobs[] = $mob;
            $mob->setAccount($this);
        }

        return $this;
    }

    public function removeMob(Mob $mob): self
    {
        if ($this->Mobs->contains($mob)) {
            $this->Mobs->removeElement($mob);
            // set the owning side to null (unless already changed)
            if ($mob->getAccount() === $this) {
                $mob->setAccount(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Rune[]
     */
    public function getRunes(): Collection
    {
        return $this->Runes;
    }

    public function addRune(Rune $rune): self
    {
        if (!$this->Runes->contains($rune)) {
            $this->Runes[] = $rune;
            $rune->setAccount($this);
        }

        return $this;
    }

    public function removeRune(Rune $rune): self
    {
        if ($this->Runes->contains($rune)) {
            $this->Runes->removeElement($rune);
            // set the owning side to null (unless already changed)
            if ($rune->getAccount() === $this) {
                $rune->setAccount(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeams(): Collection
    {
        return $this->Teams;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->Teams->contains($team)) {
            $this->Teams[] = $team;
            $team->setAccount($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->Teams->contains($team)) {
            $this->Teams->removeElement($team);
            // set the owning side to null (unless already changed)
            if ($team->getAccount() === $this) {
                $team->setAccount(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->Events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->Events->contains($event)) {
            $this->Events[] = $event;
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->Events->contains($event)) {
            $this->Events->removeElement($event);
        }

        return $this;
    }
}
