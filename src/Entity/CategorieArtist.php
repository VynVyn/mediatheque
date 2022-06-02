<?php

namespace App\Entity;

use App\Repository\CategorieArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieArtistRepository::class)]
class CategorieArtist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\OneToMany(mappedBy: 'id_category_artist', targetEntity: Information::class, orphanRemoval: true)]
    private $information;

    public function __construct()
    {
        $this->information = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Information>
     */
    public function getInformation(): Collection
    {
        return $this->information;
    }

    public function addInformation(Information $information): self
    {
        if (!$this->information->contains($information)) {
            $this->information[] = $information;
            $information->setIdCategoryArtist($this);
        }

        return $this;
    }

    public function removeInformation(Information $information): self
    {
        if ($this->information->removeElement($information)) {
            // set the owning side to null (unless already changed)
            if ($information->getIdCategoryArtist() === $this) {
                $information->setIdCategoryArtist(null);
            }
        }

        return $this;
    }
}
