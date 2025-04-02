<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $birthdayDate = null;

    #[ORM\Column(length: 100)]
    private ?string $mail = null;

    #[ORM\Column]
    private ?int $code_postal = null;

    /**
     * @var Collection<int, Magasin1>
     */
    #[ORM\ManyToMany(targetEntity: Magasin1::class, mappedBy: 'users')]
    private Collection $magasin1s;

    public function __construct()
    {
        $this->magasin1s = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

  

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthdayDate;
    }

    public function setBirthday(?\DateTimeInterface $birthdayDate): static
    {
        $this->birthdayDate = $birthdayDate;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(int $code_postal): static
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    /**
     * @return Collection<int, Magasin1>
     */
    public function getMagasin1s(): Collection
    {
        return $this->magasin1s;
    }

    public function addMagasin1(Magasin1 $magasin1): static
    {
        if (!$this->magasin1s->contains($magasin1)) {
            $this->magasin1s->add($magasin1);
            $magasin1->addUser($this);
        }

        return $this;
    }

    public function removeMagasin1(Magasin1 $magasin1): static
    {
        if ($this->magasin1s->removeElement($magasin1)) {
            $magasin1->removeUser($this);
        }

        return $this;
    }
}
