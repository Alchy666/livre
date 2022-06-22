<?php

namespace App\Entity;

use App\Repository\AuteurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuteurRepository::class)]
class Auteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $fk_auteur;

    #[ORM\ManyToOne(targetEntity: Livre::class, inversedBy: 'fk_auteur')]
    #[ORM\JoinColumn(nullable: false)]
    private $livre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkAuteur(): ?int
    {
        return $this->fk_auteur;
    }

    public function setFkAuteur(int $fk_auteur): self
    {
        $this->fk_auteur = $fk_auteur;

        return $this;
    }

    public function getLivre(): ?Livre
    {
        return $this->livre;
    }

    public function setLivre(?Livre $livre): self
    {
        $this->livre = $livre;

        return $this;
    }
}
