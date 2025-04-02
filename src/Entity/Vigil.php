<?php

namespace App\Entity;

use App\Repository\VigilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VigilRepository::class)]
class Vigil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $name = null;

    #[ORM\Column(length: 30)]
    private ?string $magasin = null;

    #[ORM\Column]
    private ?bool $arme = null;

    #[ORM\ManyToOne(inversedBy: 'vigiles')]
    private ?Magasin1 $magasin1 = null;

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

    public function getMagasin(): ?string
    {
        return $this->magasin;
    }

    public function setMagasin(string $magasin): static
    {
        $this->magasin = $magasin;

        return $this;
    }

    public function isArme(): ?bool
    {
        return $this->arme;
    }

    public function setArme(bool $arme): static
    {
        $this->arme = $arme;

        return $this;
    }

}
