<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketRepository::class)]
class Ticket
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $task;

    #[ORM\Column(type: 'integer')]
    private $predictedTime;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'date')]
    private $createdIn;

    #[ORM\ManyToOne(targetEntity: WorkSpace::class, inversedBy: 'tickets')]
    private $workSpace;

    #[ORM\ManyToOne(targetEntity: Label::class, inversedBy: 'tickets')]
    private $label;

    #[ORM\ManyToOne(targetEntity: Status::class, inversedBy: 'tickets')]
    private $status;

    #[ORM\OneToOne(inversedBy: 'ticket', targetEntity: User::class, cascade: ['persist', 'remove'])]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTask(): ?string
    {
        return $this->task;
    }

    public function setTask(string $task): self
    {
        $this->task = $task;

        return $this;
    }

    public function getPredictedTime(): ?int
    {
        return $this->predictedTime;
    }

    public function setPredictedTime(int $predictedTime): self
    {
        $this->predictedTime = $predictedTime;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedIn(): ?\DateTimeInterface
    {
        return $this->createdIn;
    }

    public function setCreatedIn(\DateTimeInterface $createdIn): self
    {
        $this->createdIn = $createdIn;

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

    public function getLabel(): ?Label
    {
        return $this->label;
    }

    public function setLabel(?Label $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
