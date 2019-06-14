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
 * @ORM\Entity(repositoryClass="App\Repository\AttributeRepository")
 * @Vich\Uploadable
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
    private $disadvattribute;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Attribute", mappedBy="advattribute")
     */
    private $Advantage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Attribute", inversedBy="Disadvantage")
     */
    private $advattribute;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Attribute", mappedBy="disadvattribute")
     */
    private $Disadvantage;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Mob", mappedBy="Attribute")
     */
    private $mob;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Image;

    /**
     * @var File|null
     * @Assert\File(mimeTypes={ "image/png", "image/jpeg" })
     * @Vich\UploadableField(mapping="attributes_image", fileNameProperty="Image")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    public function __construct()
    {
        $this->Advantage = new ArrayCollection();
        $this->Disadvantage = new ArrayCollection();
        $this->mob = new ArrayCollection();
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
            $advantage->setDisadvattribute($this);
        }

        return $this;
    }

    public function removeAdvantage(self $advantage): self
    {
        if ($this->Advantage->contains($advantage)) {
            $this->Advantage->removeElement($advantage);
            // set the owning side to null (unless already changed)
            if ($advantage->getDisadvattribute() === $this) {
                $advantage->setDisadvattribute(null);
            }
        }

        return $this;
    }

    public function getDisadvattribute(): ?self
    {
        return $this->disadvattribute;
    }

    public function setDisadvattribute(?self $disadvattribute): self
    {
        $this->disadvattribute = $disadvattribute;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getDisadvantage(): Collection
    {
        return $this->Disadvantage;
    }

    public function addDisadvantage(self $Disadvantage): self
    {
        if (!$this->Disadvantage->contains($Disadvantage)) {
            $this->Disadvantage[] = $Disadvantage;
            $Disadvantage->setAdvattribute($this);
        }

        return $this;
    }

    public function removeDisadvantage(self $Disadvantage): self
    {
        if ($this->Disadvantage->contains($Disadvantage)) {
            $this->Disadvantage->removeElement($Disadvantage);
            // set the owning side to null (unless already changed)
            if ($Disadvantage->getAdvattribute() === $this) {
                $Disadvantage->setAdvattribute(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Mob[]
     */
    public function getMob(): Collection
    {
        return $this->mob;
    }

    public function addMob(Mob $mob): self
    {
        if (!$this->mob->contains($mob)) {
            $this->mob[] = $mob;
            $mob->setAttribute($this);
        }

        return $this;
    }

    public function removeMob(Mob $mob): self
    {
        if ($this->mob->contains($mob)) {
            $this->mob->removeElement($mob);
            // set the owning side to null (unless already changed)
            if ($mob->getAttribute() === $this) {
                $mob->setAttribute(null);
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
