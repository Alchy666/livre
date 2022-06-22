<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToMany(mappedBy: 'livre', targetEntity: Auteur::class)]
    private $fk_auteur;

    #[ORM\OneToMany(mappedBy: 'livre', targetEntity: Genre::class)]
    private $fk_genre;

    // #[ORM\Column(type: 'integer')]
    // private $id_livre;

    #[ORM\Column(type: 'string', length: 255)]
    private $title_livre;

    #[ORM\Column(type: 'string', length: 255)]
    private $auteur_livre;

    #[ORM\Column(type: 'text', nullable: true)]
    private $resume_livre;

    #[ORM\Column(type: 'integer')]
    private $prix_livre;

    #[ORM\Column(type: 'date')]
    private $datesortie_livre;

    #[ORM\Column(type: 'string', length: 255)]
    private $genre_livre;

    #[ORM\Column(type: 'string', length: 255)]
    private $edition_livre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image_livre;

    #[ORM\Column(type: 'string', length: 255)]
    private $isbn_livre;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $stock_livre;

    public function __construct()
    {
        $this->fk_auteur = new ArrayCollection();
        $this->fk_genre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Auteur>
     */
    public function getFkAuteur(): Collection
    {
        return $this->fk_auteur;
    }

    public function addFkAuteur(Auteur $fkAuteur): self
    {
        if (!$this->fk_auteur->contains($fkAuteur)) {
            $this->fk_auteur[] = $fkAuteur;
            $fkAuteur->setLivre($this);
        }

        return $this;
    }

    public function removeFkAuteur(Auteur $fkAuteur): self
    {
        if ($this->fk_auteur->removeElement($fkAuteur)) {
            // set the owning side to null (unless already changed)
            if ($fkAuteur->getLivre() === $this) {
                $fkAuteur->setLivre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Genre>
     */
    public function getFkGenre(): Collection
    {
        return $this->fk_genre;
    }

    public function addFkGenre(Genre $fkGenre): self
    {
        if (!$this->fk_genre->contains($fkGenre)) {
            $this->fk_genre[] = $fkGenre;
            $fkGenre->setLivre($this);
        }

        return $this;
    }

    public function removeFkGenre(Genre $fkGenre): self
    {
        if ($this->fk_genre->removeElement($fkGenre)) {
            // set the owning side to null (unless already changed)
            if ($fkGenre->getLivre() === $this) {
                $fkGenre->setLivre(null);
            }
        }

        return $this;
    }

    // public function getIdLivre(): ?int
    // {
    //     return $this->id_livre;
    // }

    // public function setIdLivre(int $id_livre): self
    // {
    //     $this->id_livre = $id_livre;

    //     return $this;
    // }

    public function getTitleLivre(): ?string
    {
        return $this->title_livre;
    }

    public function setTitleLivre(string $title_livre): self
    {
        $this->title_livre = $title_livre;

        return $this;
    }

    public function getAuteurLivre(): ?string
    {
        return $this->auteur_livre;
    }

    public function setAuteurLivre(string $auteur_livre): self
    {
        $this->auteur_livre = $auteur_livre;

        return $this;
    }

    public function getResumeLivre(): ?string
    {
        return $this->resume_livre;
    }

    public function setResumeLivre(?string $resume_livre): self
    {
        $this->resume_livre = $resume_livre;

        return $this;
    }

    public function getPrixLivre(): ?int
    {
        return $this->prix_livre;
    }

    public function setPrixLivre(int $prix_livre): self
    {
        $this->prix_livre = $prix_livre;

        return $this;
    }

    public function getDatesortieLivre(): ?\DateTimeInterface
    {
        return $this->datesortie_livre;
    }

    public function setDatesortieLivre(\DateTimeInterface $datesortie_livre): self
    {
        $this->datesortie_livre = $datesortie_livre;

        return $this;
    }

    public function getGenreLivre(): ?string
    {
        return $this->genre_livre;
    }

    public function setGenreLivre(string $genre_livre): self
    {
        $this->genre_livre = $genre_livre;

        return $this;
    }

    public function getEditionLivre(): ?string
    {
        return $this->edition_livre;
    }

    public function setEditionLivre(string $edition_livre): self
    {
        $this->edition_livre = $edition_livre;

        return $this;
    }

    public function getImageLivre(): ?string
    {
        return $this->image_livre;
    }

    public function setImageLivre(?string $image_livre): self
    {
        $this->image_livre = $image_livre;

        return $this;
    }

    public function getIsbnLivre(): ?string
    {
        return $this->isbn_livre;
    }

    public function setIsbnLivre(string $isbn_livre): self
    {
        $this->isbn_livre = $isbn_livre;

        return $this;
    }

    public function getStockLivre(): ?int
    {
        return $this->stock_livre;
    }

    public function setStockLivre(?int $stock_livre): self
    {
        $this->stock_livre = $stock_livre;

        return $this;
    }
}
