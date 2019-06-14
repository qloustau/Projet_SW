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
 * @ORM\Entity(repositoryClass="App\Repository\BuffsRepository")
 * @Vich\Uploadable
 */
class Buffs
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Value;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Skill", mappedBy="Buffs")
     */
    private $buffskills;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $StatEffect;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Image;

    /**
     * @var File|null
     * @Assert\File(mimeTypes={ "image/png", "image/jpeg" })
     * @Vich\UploadableField(mapping="buffs_image", fileNameProperty="Image")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    public function __construct()
    {
        $this->buffskills = new ArrayCollection();
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

    public function getValue(): ?int
    {
        return $this->Value;
    }

    public function setValue(int $Value): self
    {
        $this->Value = $Value;

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getBuffskills(): Collection
    {
        return $this->buffskills;
    }

    public function addBuffskills(Skill $buffskill): self
    {
        if (!$this->buffskills->contains($buffskill)) {
            $this->buffskills[] = $buffskill;
            $buffskill->addBuff($this);
        }

        return $this;
    }

    public function removeBuffskills(Skill $buffskill): self
    {
        if ($this->buffskills->contains($buffskill)) {
            $this->buffskills->removeElement($buffskill);
            $buffskill->removeBuff($this);
        }

        return $this;
    }

    public function getStatEffect(): ?int
    {
        return $this->StatEffect;
    }

    public function setStatEffect(int $StatEffect): self
    {
        $this->StatEffect = $StatEffect;

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
