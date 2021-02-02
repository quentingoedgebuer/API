<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @ApiResource(normalizationContext={"groups"={"Article"}, "enable_max_depth"=true})
 * @ApiFilter(SearchFilter::class, properties={*})
 * @APIFilter(SearchFilter::class,properties={"url":"exact", "titre":"partial"})


 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("categorie")
     * @Groups({"Article"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("categorie")
     * @Groups({"Article"})
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     * @Groups("categorie")
     * @Groups({"Article"})
     */
    private $contenu;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"Article"})
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"Article"})
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"Article"})
     */
    private $extrait;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"Article"})
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"Article"})
     */
    private $categorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getExtrait(): ?string
    {
        return $this->extrait;
    }

    public function setExtrait(string $extrait): self
    {
        $this->extrait = $extrait;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
