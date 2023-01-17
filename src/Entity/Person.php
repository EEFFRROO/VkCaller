<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $vkId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastName = null;

    #[ORM\OneToMany(mappedBy: 'interlocutor', targetEntity: Call::class)]
    private Collection $calls;

    public function __construct()
    {
        $this->calls = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVkId(): ?int
    {
        return $this->vkId;
    }

    public function setVkId(int $vkId): self
    {
        $this->vkId = $vkId;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Collection<int, Call>
     */
    public function getCalls(): Collection
    {
        return $this->calls;
    }

    public function addCall(Call $call): self
    {
        if (!$this->calls->contains($call)) {
            $this->calls->add($call);
            $call->setInterlocutor($this);
        }

        return $this;
    }

    public function removeCall(Call $call): self
    {
        if ($this->calls->removeElement($call)) {
            // set the owning side to null (unless already changed)
            if ($call->getInterlocutor() === $this) {
                $call->setInterlocutor(null);
            }
        }

        return $this;
    }
}
