<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenreRepository::class)]
class Genre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $fk_genre;

    #[ORM\ManyToOne(targetEntity: Livre::class, inversedBy: 'fk_genre')]
    #[ORM\JoinColumn(nullable: false)]
    private $livre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkGenre(): ?int
    {
        return $this->fk_genre;
    }

    public function setFkGenre(int $fk_genre): self
    {
        $this->fk_genre = $fk_genre;

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
