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
 * @ORM\Entity(repositoryClass="App\Repository\SkillRepository")
 * @Vich\Uploadable
 */
class Skill
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
    private $SkillUp;

    /**
     * @ORM\ManyToMany(targetEntity="Buffs", inversedBy="buffskills")
     */
    private $Buffs;

    /**
     * @ORM\ManyToMany(targetEntity="Debuffs", inversedBy="debuffskills")
     */
    private $Debuffs;

    /**
     * @ORM\Column(type="boolean")
     */
    private $State;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Passif;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $LeaderSkill = [];

    /**
     * @ORM\ManyToMany(targetEntity="OtherEffect", inversedBy="othereffectskills")
     */
    private $OtherEffect;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Mob", inversedBy="Skills")
     */
    private $mobs;

    /**
     * @ORM\Column(type="boolean")
     */
    private $SkillAwake;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Image;

    /**
     * @var File|null
     * @Assert\File(mimeTypes={ "image/png", "image/jpeg" })
     * @Vich\UploadableField(mapping="skills_image", fileNameProperty="Image")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Element;

    public function __construct()
    {
        $this->Buffs = new ArrayCollection();
        $this->Debuffs = new ArrayCollection();
        $this->OtherEffect = new ArrayCollection();
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

    public function getSkillUp(): ?int
    {
        return $this->SkillUp;
    }

    public function setSkillUp(int $SkillUp): self
    {
        $this->SkillUp = $SkillUp;

        return $this;
    }

    /**
     * @return Collection|Buffs[]
     */
    public function getBuffs(): Collection
    {
        return $this->Buffs;
    }

    public function addBuff(Buffs $buff): self
    {
        if (!$this->Buffs->contains($buff)) {
            $this->Buffs[] = $buff;
        }

        return $this;
    }

    public function removeBuff(Buffs $buff): self
    {
        if ($this->Buffs->contains($buff)) {
            $this->Buffs->removeElement($buff);
        }

        return $this;
    }

    /**
     * @return Collection|Debuffs[]
     */
    public function getDebuffs(): Collection
    {
        return $this->Debuffs;
    }

    public function addDebuff(Debuffs $debuff): self
    {
        if (!$this->Debuffs->contains($debuff)) {
            $this->Debuffs[] = $debuff;
        }

        return $this;
    }

    public function removeDebuff(Debuffs $debuff): self
    {
        if ($this->Debuffs->contains($debuff)) {
            $this->Debuffs->removeElement($debuff);
        }

        return $this;
    }

    public function getState(): ?bool
    {
        return $this->State;
    }

    public function setState(bool $State): self
    {
        $this->State = $State;

        return $this;
    }

    public function getPassif(): ?bool
    {
        return $this->Passif;
    }

    public function setPassif(bool $Passif): self
    {
        $this->Passif = $Passif;

        return $this;
    }

    public function getLeaderSkill(): ?array
    {
        return $this->LeaderSkill;
    }

    public function setLeaderSkill(?array $LeaderSkill): self
    {
        $this->LeaderSkill = $LeaderSkill;

        return $this;
    }

    /**
     * @return Collection|OtherEffect[]
     */
    public function getOtherEffect(): Collection
    {
        return $this->OtherEffect;
    }

    public function addOtherEffect(OtherEffect $othereffect): self
    {
        if (!$this->OtherEffect->contains($othereffect)) {
            $this->OtherEffect[] = $othereffect;
        }

        return $this;
    }

    public function removeOtherEffect(OtherEffect $othereffect): self
    {
        if ($this->OtherEffect->contains($othereffect)) {
            $this->OtherEffect->removeElement($othereffect);
        }

        return $this;
    }

    public function getMobs(): ?Mob
    {
        return $this->mobs;
    }

    public function setMobs(?Mob $mobs): self
    {
        $this->mobs = $mobs;

        return $this;
    }

    public function getSkillAwake(): ?bool
    {
        return $this->SkillAwake;
    }

    public function setSkillAwake(bool $SkillAwake): self
    {
        $this->SkillAwake = $SkillAwake;

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

    public function getElement(): ?string
    {
        return $this->Element;
    }

    public function setElement(string $Element): self
    {
        $this->Element = $Element;

        return $this;
    }
}
