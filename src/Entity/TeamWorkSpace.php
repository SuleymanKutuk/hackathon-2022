<?php

namespace App\Entity;

use App\Repository\TeamWorkSpaceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamWorkSpaceRepository::class)]
class TeamWorkSpace
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $proposition;

    #[ORM\Column(type: 'boolean')]
    private $isGranted;

    #[ORM\ManyToOne(targetEntity: Team::class, inversedBy: 'teamWorkSpaces')]
    private $team;

    #[ORM\ManyToOne(targetEntity: WorkSpace::class, inversedBy: 'teamWorkSpaces')]
    #[ORM\JoinColumn(nullable: false)]
    private $workSpace;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProposition(): ?string
    {
        return $this->proposition;
    }

    public function setProposition(string $proposition): self
    {
        $this->proposition = $proposition;

        return $this;
    }

    public function isIsGranted(): ?bool
    {
        return $this->isGranted;
    }

    public function setIsGranted(bool $isGranted): self
    {
        $this->isGranted = $isGranted;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function getWorkSpace(): ?WorkSpace
    {
        return $this->workSpace;
    }

    public function setWorkSpace(?WorkSpace $workSpace): self
    {
        $this->workSpace = $workSpace;

        return $this;
    }
}
