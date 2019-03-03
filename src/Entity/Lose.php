<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LoseRepository")
 */
class Lose
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
    private $TeamAtt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Team", mappedBy="lose")
     */
    private $Team;

    public function __construct()
    {
        $this->Team = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeamAtt(): ?string
    {
        return $this->TeamAtt;
    }

    public function setTeamAtt(string $TeamAtt): self
    {
        $this->TeamAtt = $TeamAtt;

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeams(): Collection
    {
        return $this->Team;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->Team->contains($team)) {
            $this->Team[] = $team;
            $team->addLose($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->Team->contains($team)) {
            $this->Team->removeElement($team);
            $team->removeLose($this);
        }

        return $this;
    }
}
