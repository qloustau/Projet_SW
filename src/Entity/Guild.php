<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GuildRepository")
 */
class Guild
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
     * @ORM\Column(type="integer")
     */
    private $NumbersOfMembres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Leader;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\GuildWar", mappedBy="Guilds")
     */
    private $guildWars;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Account", mappedBy="Guild")
     */
    private $accounts;

    public function __construct()
    {
        $this->guildWars = new ArrayCollection();
        $this->accounts = new ArrayCollection();
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

    public function getNumbersOfMembres(): ?int
    {
        return $this->NumbersOfMembres;
    }

    public function setNumbersOfMembres(int $NumbersOfMembres): self
    {
        $this->NumbersOfMembres = $NumbersOfMembres;

        return $this;
    }

    public function getLeader(): ?string
    {
        return $this->Leader;
    }

    public function setLeader(string $Leader): self
    {
        $this->Leader = $Leader;

        return $this;
    }

    /**
     * @return Collection|GuildWar[]
     */
    public function getGuildWars(): Collection
    {
        return $this->guildWars;
    }

    public function addGuildWar(GuildWar $guildWar): self
    {
        if (!$this->guildWars->contains($guildWar)) {
            $this->guildWars[] = $guildWar;
            $guildWar->addGuild($this);
        }

        return $this;
    }

    public function removeGuildWar(GuildWar $guildWar): self
    {
        if ($this->guildWars->contains($guildWar)) {
            $this->guildWars->removeElement($guildWar);
            $guildWar->removeGuild($this);
        }

        return $this;
    }

    /**
     * @return Collection|Account[]
     */
    public function getAccounts(): Collection
    {
        return $this->accounts;
    }

    public function addAccount(Account $account): self
    {
        if (!$this->accounts->contains($account)) {
            $this->accounts[] = $account;
            $account->setGuild($this);
        }

        return $this;
    }

    public function removeAccount(Account $account): self
    {
        if ($this->accounts->contains($account)) {
            $this->accounts->removeElement($account);
            // set the owning side to null (unless already changed)
            if ($account->getGuild() === $this) {
                $account->setGuild(null);
            }
        }

        return $this;
    }
}
