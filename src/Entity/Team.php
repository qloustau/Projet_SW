<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 */
class Team
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Mob", inversedBy="teams")
     */
    private $Mobs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\GuildWar", mappedBy="Teams")
     */
    private $guildWars;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account", inversedBy="Teams")
     * @ORM\JoinColumn(nullable=false)
     */
    private $account;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Win", inversedBy="Team")
     */
    private $win;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Lose", inversedBy="Team")
     */
    private $lose;

    public function __construct()
    {
        $this->Mobs = new ArrayCollection();
        $this->win = new ArrayCollection();
        $this->lose = new ArrayCollection();
        $this->guildWars = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
        }

        return $this;
    }

    public function removeMob(Mob $mob): self
    {
        if ($this->Mobs->contains($mob)) {
            $this->Mobs->removeElement($mob);
        }

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
            $guildWar->addTeam($this);
        }

        return $this;
    }

    public function removeGuildWar(GuildWar $guildWar): self
    {
        if ($this->guildWars->contains($guildWar)) {
            $this->guildWars->removeElement($guildWar);
            $guildWar->removeTeam($this);
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

    /**
     * @return Collection|Win[]
     */
    public function getWins(): Collection
    {
        return $this->win;
    }

    public function addWin(Win $win): self
    {
        if (!$this->win->contains($win)) {
            $this->win[] = $win;
        }

        return $this;
    }

    public function removeWin(Win $win): self
    {
        if ($this->win->contains($win)) {
            $this->win->removeElement($win);
        }

        return $this;
    }

    /**
     * @return Collection|Lose[]
     */
    public function getLoses(): Collection
    {
        return $this->lose;
    }

    public function addLose(Lose $lose): self
    {
        if (!$this->lose->contains($lose)) {
            $this->lose[] = $lose;
        }

        return $this;
    }

    public function removeLose(Lose $lose): self
    {
        if ($this->lose->contains($lose)) {
            $this->lose->removeElement($lose);
        }

        return $this;
    }
}
