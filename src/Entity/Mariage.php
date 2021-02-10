<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * Mariage
 *
 * @ApiResource(normalizationContext={"groups"={"mariage"}})
 * @ApiFilter(SearchFilter::class, properties={*})
 * @ORM\Table(name="mariage")
 * @ORM\Entity
 */
class Mariage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"mariage"})
     * @Groups("listingTranslation")
     * @Groups("lesListing")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=40, nullable=false)
     * @Groups({"mariage"})
     * @Groups("listingTranslation")
     * @Groups("lesListing")
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="texte", type="text", length=0, nullable=true)
     * @Groups({"mariage"})
     * @Groups("lesListing")
     */
    private $texte;

    /**
     * @var string|null
     *
     * @Groups({"mariage"})
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     * @Groups("lesListing")
     */
    private $image;

    /**
     * @var string|null
     *
     * @ORM\Column(name="traduction", type="string", length=255, nullable=true)
     * @Groups({"mariage"})
     * @Groups("lesListing")
     */
    private $traduction;

    /**
     * @var string|null
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     * @Groups({"mariage"})
     * @Groups("lesListing")
     */
    private $logo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imageaccueil", type="string", length=255, nullable=true)
     * @Groups({"mariage"})
     * @Groups("lesListing")
     */
    private $imageaccueil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     * @Groups({"mariage"})
     */
    private $url;

    /**
     * @ORM\ManyToMany(targetEntity=Listing::class, mappedBy="mariages")
     * @Groups({"mariage"})
     */
    private $listings;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(?string $texte): self
    {
        $this->texte = $texte;

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

    public function getTraduction(): ?string
    {
        return $this->traduction;
    }

    public function setTraduction(?string $traduction): self
    {
        $this->traduction = $traduction;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getImageaccueil(): ?string
    {
        return $this->imageaccueil;
    }

    public function setImageaccueil(?string $imageaccueil): self
    {
        $this->imageaccueil = $imageaccueil;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return Collection|Listing[]
     */
    public function getListings(): Collection
    {
        return $this->listings;
    }

    public function addListing(Listing $listing): self
    {
        if (!$this->listings->contains($listing)) {
            $this->listings[] = $listing;
            $listing->addMariage($this);
        }

        return $this;
    }

    public function removeListing(Listing $listing): self
    {
        if ($this->listings->removeElement($listing)) {
            $listing->removeMariage($this);
        }

        return $this;
    }

}
