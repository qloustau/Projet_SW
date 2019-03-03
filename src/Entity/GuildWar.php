<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GuildWarRepository")
 */
class GuildWar
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Guild", inversedBy="guildWars")
     */
    private $Guilds;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Team", inversedBy="guildWars")
     */
    private $Teams;

    public function __construct()
    {
        $this->Guilds = new ArrayCollection();
        $this->Teams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    /**
     * @return Collection|Guild[]
     */
    public function getGuilds(): Collection
    {
        return $this->Guilds;
    }

    public function addGuild(Guild $guild): self
    {
        if (!$this->Guilds->contains($guild)) {
            $this->Guilds[] = $guild;
        }

        return $this;
    }

    public function removeGuild(Guild $guild): self
    {
        if ($this->Guilds->contains($guild)) {
            $this->Guilds->removeElement($guild);
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
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->Teams->contains($team)) {
            $this->Teams->removeElement($team);
        }

        return $this;
    }
}
