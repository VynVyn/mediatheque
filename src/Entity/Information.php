<?php

namespace App\Entity;

use App\Repository\InformationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InformationRepository::class)]
class Information
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Artist::class, inversedBy: 'information')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_artist;

    #[ORM\ManyToOne(targetEntity: Document::class, inversedBy: 'information')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_document;

    #[ORM\ManyToOne(targetEntity: CategorieArtist::class, inversedBy: 'information')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_category_artist;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdArtist(): ?Artist
    {
        return $this->id_artist;
    }

    public function setIdArtist(?Artist $id_artist): self
    {
        $this->id_artist = $id_artist;

        return $this;
    }

    public function getIdDocument(): ?Document
    {
        return $this->id_document;
    }

    public function setIdDocument(?Document $id_document): self
    {
        $this->id_document = $id_document;

        return $this;
    }

    public function getIdCategoryArtist(): ?CategorieArtist
    {
        return $this->id_category_artist;
    }

    public function setIdCategoryArtist(?CategorieArtist $id_category_artist): self
    {
        $this->id_category_artist = $id_category_artist;

        return $this;
    }
}
