<?php

namespace App\Entity;

use App\Repository\WorkSpaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkSpaceRepository::class)]
class WorkSpace
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'boolean')]
    private $interested;

    #[ORM\OneToMany(mappedBy: 'workSpace', targetEntity: Ticket::class)]
    private $tickets;

    #[ORM\OneToMany(mappedBy: 'workSpace', targetEntity: Chat::class)]
    private $chats;

    #[ORM\OneToMany(mappedBy: 'workSpace', targetEntity: TeamWorkSpace::class, orphanRemoval: true)]
    private $teamWorkSpaces;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    public function __construct()
    {
        $this->tickets = new ArrayCollection();
        $this->chats = new ArrayCollection();
        $this->teamWorkSpaces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isInterested(): ?bool
    {
        return $this->interested;
    }

    public function setInterested(bool $interested): self
    {
        $this->interested = $interested;

        return $this;
    }

    /**
     * @return Collection<int, Ticket>
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTicket(Ticket $ticket): self
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets[] = $ticket;
            $ticket->setWorkSpace($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): self
    {
        if ($this->tickets->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getWorkSpace() === $this) {
                $ticket->setWorkSpace(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Chat>
     */
    public function getChats(): Collection
    {
        return $this->chats;
    }

    public function addChat(Chat $chat): self
    {
        if (!$this->chats->contains($chat)) {
            $this->chats[] = $chat;
            $chat->setWorkSpace($this);
        }

        return $this;
    }

    public function removeChat(Chat $chat): self
    {
        if ($this->chats->removeElement($chat)) {
            // set the owning side to null (unless already changed)
            if ($chat->getWorkSpace() === $this) {
                $chat->setWorkSpace(null);
            }
        }

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
            $teamWorkSpace->setWorkSpace($this);
        }

        return $this;
    }

    public function removeTeamWorkSpace(TeamWorkSpace $teamWorkSpace): self
    {
        if ($this->teamWorkSpaces->removeElement($teamWorkSpace)) {
            // set the owning side to null (unless already changed)
            if ($teamWorkSpace->getWorkSpace() === $this) {
                $teamWorkSpace->setWorkSpace(null);
            }
        }

        return $this;
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
}
