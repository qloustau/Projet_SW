<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MobRepository")
 * @Vich\Uploadable
 */
class Mob
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
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Family;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Attribute", inversedBy="mob")
     */
    private $Attribute;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Class;

    /**
     * @ORM\Column(type="integer")
     */
    private $GradeNat;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Skill", mappedBy="mobs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Skills;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rune", inversedBy="mobs")
     */
    private $Runes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Team", mappedBy="Mobs")
     */
    private $teams;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account", inversedBy="Mobs")
     * @ORM\JoinColumn(nullable=true)
     */
    private $account;

    /**
     * @ORM\Column(type="integer")
     */
    private $Devilmon;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $Awake = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stats", mappedBy="mobs")
     */
    private $Stats;



    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Image;

    /**
     * @var File|null
     * @Assert\File(mimeTypes={ "image/png", "image/jpeg" })
     * @Vich\UploadableField(mapping="monstres_image", fileNameProperty="Image")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    public function __construct()
    {
        $this->Skills = new ArrayCollection();
        $this->teams = new ArrayCollection();
        $this->Stats = new ArrayCollection();
    }

    public function __toString() {
        return $this->Name;
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

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getFamily(): ?string
    {
        return $this->Family;
    }

    public function setFamily(string $Family): self
    {
        $this->Family = $Family;

        return $this;
    }

    public function getAttribute(): ?Attribute
    {
        return $this->Attribute;
    }

    public function setAttribute(?Attribute $attribute): self
    {
        $this->Attribute = $attribute;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->Class;
    }

    public function setClass(string $Class): self
    {
        $this->Class = $Class;

        return $this;
    }

    public function getGradeNat(): ?int
    {
        return $this->GradeNat;
    }

    public function setGradeNat(int $GradeNat): self
    {
        $this->GradeNat = $GradeNat;

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->Skills;
    }

    public function addSkill(Skill $Skills): self
    {
        if (!$this->Skills->contains($Skills)) {
            $this->Skills[] = $Skills;
            $Skills->setMobs($this);
        }

        return $this;
    }

    public function removeSkill(Skill $Skills): self
    {
        if ($this->Skills->contains($Skills)) {
            $this->Skills->removeElement($Skills);
            // set the owning side to null (unless already changed)
            if ($Skills->getMobs() === $this) {
                $Skills->setMobs(null);
            }
        }

        return $this;
    }

    public function getRunes(): ?Rune
    {
        return $this->Runes;
    }

    public function setRunes(?Rune $Runes): self
    {
        $this->Runes = $Runes;

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams[] = $team;
            $team->addMob($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->teams->contains($team)) {
            $this->teams->removeElement($team);
            $team->removeMob($this);
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

    public function getDevilmon(): ?int
    {
        return $this->Devilmon;
    }

    public function setDevilmon(int $Devilmon): self
    {
        $this->Devilmon = $Devilmon;

        return $this;
    }

    public function getAwake(): ?array
    {
        return $this->Awake;
    }

    public function setAwake(?array $Awake): self
    {
        $this->Awake = $Awake;

        return $this;
    }

    /**
     * @return Collection|Stats[]
     */
    public function getStats(): Collection
    {
        return $this->Stats;
    }

    public function addStats(Stats $Stats): self
    {
        if (!$this->Stats->contains($Stats)) {
            $this->Stats[] = $Stats;
            $Stats->setMobs($this);
        }

        return $this;
    }

    public function removeStats(Stats $Stats): self
    {
        if ($this->Stats->contains($Stats)) {
            $this->Stats->removeElement($Stats);
            // set the owning side to null (unless already changed)
            if ($Stats->getMobs() === $this) {
                $Stats->setMobs(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile): self
    {
        date_default_timezone_set('Europe/Paris');
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof UploadedFile){
            $this->updated_at =  new \DateTime('now');
            dump($this->updated_at);
        }

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
