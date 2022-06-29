<?php

namespace App\Entity;

use App\Repository\UsedLanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsedLanguageRepository::class)]
class UsedLanguage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToMany(targetEntity: ProjectType::class, mappedBy: 'usedLanguage')]
    private $projectTypes;

    public function __construct()
    {
        $this->projectTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, ProjectType>
     */
    public function getProjectTypes(): Collection
    {
        return $this->projectTypes;
    }

    public function addProjectType(ProjectType $projectType): self
    {
        if (!$this->projectTypes->contains($projectType)) {
            $this->projectTypes[] = $projectType;
            $projectType->addUsedLanguage($this);
        }

        return $this;
    }

    public function removeProjectType(ProjectType $projectType): self
    {
        if ($this->projectTypes->removeElement($projectType)) {
            $projectType->removeUsedLanguage($this);
        }

        return $this;
    }
}
