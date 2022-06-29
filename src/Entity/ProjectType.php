<?php

namespace App\Entity;

use App\Repository\ProjectTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectTypeRepository::class)]
class ProjectType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $type;

    #[ORM\ManyToMany(targetEntity: UsedLanguage::class, inversedBy: 'projectTypes')]
    private $usedLanguage;

    public function __construct()
    {
        $this->usedLanguage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, UsedLanguage>
     */
    public function getUsedLanguage(): Collection
    {
        return $this->usedLanguage;
    }

    public function addUsedLanguage(UsedLanguage $usedLanguage): self
    {
        if (!$this->usedLanguage->contains($usedLanguage)) {
            $this->usedLanguage[] = $usedLanguage;
        }

        return $this;
    }

    public function removeUsedLanguage(UsedLanguage $usedLanguage): self
    {
        $this->usedLanguage->removeElement($usedLanguage);

        return $this;
    }
}
