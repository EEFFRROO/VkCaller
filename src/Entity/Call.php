<?php

namespace App\Entity;

use App\Repository\CallRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CallRepository::class)]
class Call
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'calls')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $interlocutor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInterlocutor(): ?Person
    {
        return $this->interlocutor;
    }

    public function setInterlocutor(?Person $interlocutor): self
    {
        $this->interlocutor = $interlocutor;

        return $this;
    }
}
