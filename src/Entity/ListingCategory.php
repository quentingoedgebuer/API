<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * ListingCategory
 * 
 * @ApiResource(normalizationContext={"groups"={"listingCategory"}})
 * @ApiFilter(SearchFilter::class, properties={*})
 * @ORM\Table(name="listing_category", indexes={@ORM\Index(name="IDX_E0307BBB727ACA70", columns={"parent_id"})})
 * @ORM\Entity
 */
class ListingCategory
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"listingCategory"})
     * @Groups("listing")
     * @Groups("mariage")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     * @Groups({"listingCategory"})
     * @Groups("listing")
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="texte", type="text", length=0, nullable=true)
     * @Groups({"listingCategory"})
     * @Groups("listing")
     */
    private $texte;

    /**
     * @var string|null
     *
     * @ORM\Column(name="texteaccueil", type="text", length=0, nullable=true)
     * @Groups({"listingCategory"})
     * @Groups("listing")
     */
    private $texteaccueil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     * @Groups({"listingCategory"})
     * @Groups("listing")
     */
    private $image;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imageaccueil", type="string", length=255, nullable=true)
     * @Groups({"listingCategory"})
     * @Groups("listing")
     */
    private $imageaccueil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     * @Groups({"listingCategory"})
     * @Groups("listing")
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=255, nullable=true)
     * @Groups({"listingCategory"})
     * @Groups("listing")
     */
    private $description;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="accueil", type="boolean", nullable=true)
     * @Groups({"listingCategory"})
     * @Groups("listing")
     */
    private $accueil;

    /**
     * @var int
     *
     * @ORM\Column(name="lft", type="integer", nullable=true)
     */
    private $lft;

    /**
     * @var int
     *
     * @ORM\Column(name="lvl", type="integer", nullable=true)
     */
    private $lvl;

    /**
     * @var int
     *
     * @ORM\Column(name="rgt", type="integer", nullable=true)
     */
    private $rgt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="root", type="integer", nullable=true)
     */
    private $root;

    /**
     * @var \ListingCategory
     *
     * @ORM\ManyToOne(targetEntity="ListingCategory")
     * @Groups({"listingCategory"})
     * @Groups("listing")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity=ListingCategoryTranslation::class, mappedBy="translatable")
     * @Groups({"listingCategory"})
     * @Groups("listing")
     * @Groups("mariage")
     */
    private $listingCategoryTranslations;

    /**
     * @ORM\ManyToMany(targetEntity=Listing::class, mappedBy="ListingCategory")
     * @Groups({"listingCategory"})
     */
    private $listings;

    public function __construct()
    {
        $this->listingCategoryTranslations = new ArrayCollection();
        $this->listings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(?string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getTexteaccueil(): ?string
    {
        return $this->texteaccueil;
    }

    public function setTexteaccueil(?string $texteaccueil): self
    {
        $this->texteaccueil = $texteaccueil;

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

    public function getImageaccueil(): ?string
    {
        return $this->imageaccueil;
    }

    public function setImageaccueil(?string $imageaccueil): self
    {
        $this->imageaccueil = $imageaccueil;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAccueil(): ?bool
    {
        return $this->accueil;
    }

    public function setAccueil(?bool $accueil): self
    {
        $this->accueil = $accueil;

        return $this;
    }

    public function getLft(): ?int
    {
        return $this->lft;
    }

    public function setLft(int $lft): self
    {
        $this->lft = $lft;

        return $this;
    }

    public function getLvl(): ?int
    {
        return $this->lvl;
    }

    public function setLvl(int $lvl): self
    {
        $this->lvl = $lvl;

        return $this;
    }

    public function getRgt(): ?int
    {
        return $this->rgt;
    }

    public function setRgt(int $rgt): self
    {
        $this->rgt = $rgt;

        return $this;
    }

    public function getRoot(): ?int
    {
        return $this->root;
    }

    public function setRoot(?int $root): self
    {
        $this->root = $root;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|ListingCategoryTranslation[]
     */
    public function getListingCategoryTranslations(): Collection
    {
        return $this->listingCategoryTranslations;
    }

    public function addListingCategoryTranslation(ListingCategoryTranslation $listingCategoryTranslation): self
    {
        if (!$this->listingCategoryTranslations->contains($listingCategoryTranslation)) {
            $this->listingCategoryTranslations[] = $listingCategoryTranslation;
            $listingCategoryTranslation->setTranslatable($this);
        }

        return $this;
    }

    public function removeListingCategoryTranslation(ListingCategoryTranslation $listingCategoryTranslation): self
    {
        if ($this->listingCategoryTranslations->removeElement($listingCategoryTranslation)) {
            // set the owning side to null (unless already changed)
            if ($listingCategoryTranslation->getTranslatable() === $this) {
                $listingCategoryTranslation->setTranslatable(null);
            }
        }

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
            $listing->addListingCategory($this);
        }

        return $this;
    }

    public function removeListing(Listing $listing): self
    {
        if ($this->listings->removeElement($listing)) {
            $listing->removeListingCategory($this);
        }

        return $this;
    }


}
