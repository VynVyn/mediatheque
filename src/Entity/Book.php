<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book extends Document
{

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'integer')]
    private int $numberPage;

    #[ORM\ManyToOne(targetEntity: Langue::class, inversedBy: 'books')]
    private Langue $langue;


    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getNumberPage(): ?int
    {
        return $this->numberPage;
    }

    public function setNumberPage(int $numberPage): self
    {
        $this->numberPage = $numberPage;

        return $this;
    }

    public function getLangue(): ?Langue
    {
        return $this->langue;
    }

    public function setLangue(?Langue $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getId();
    }

}
