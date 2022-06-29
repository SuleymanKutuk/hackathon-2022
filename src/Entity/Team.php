<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'teams')]
    private $users;

    #[ORM\ManyToOne(targetEntity: Agency::class, inversedBy: 'teams')]
    private $agency;

    #[ORM\OneToMany(mappedBy: 'team', targetEntity: TeamWorkSpace::class)]
    private $teamWorkSpaces;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->teamWorkSpaces = new ArrayCollection();
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
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addTeam($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeTeam($this);
        }

        return $this;
    }

    public function getAgency(): ?Agency
    {
        return $this->agency;
    }

    public function setAgency(?Agency $agency): self
    {
        $this->agency = $agency;

        return $this;
    }

    /**
     * @return Collection<int, TeamWorkSpace>
     */
    public function getTeamWorkSpaces(): Collection
    {
        return $this->teamWorkSpaces;
    }

    public function addTeamWorkSpace(TeamWorkSpace $teamWorkSpace): self
    {
        if (!$this->teamWorkSpaces->contains($teamWorkSpace)) {
            $this->teamWorkSpaces[] = $teamWorkSpace;
            $teamWorkSpace->setTeam($this);
        }

        return $this;
    }

    public function removeTeamWorkSpace(TeamWorkSpace $teamWorkSpace): self
    {
        if ($this->teamWorkSpaces->removeElement($teamWorkSpace)) {
            // set the owning side to null (unless already changed)
            if ($teamWorkSpace->getTeam() === $this) {
                $teamWorkSpace->setTeam(null);
            }
        }

        return $this;
    }
}
