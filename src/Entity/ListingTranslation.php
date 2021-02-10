<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * ListingTranslation
 *
 * @ApiResource(normalizationContext={"groups"={"listingTranslation"}})
 * @ApiFilter(SearchFilter::class, properties={"slug":"exact"})
 * @ORM\Table(name="listing_translation", uniqueConstraints={@ORM\UniqueConstraint(name="listing_translation_unique_translation", columns={"translatable_id", "locale"})}, indexes={@ORM\Index(name="slug_idx", columns={"slug"}), @ORM\Index(name="IDX_E3779C3D2C2AC5D3", columns={"translatable_id"})})
 * @ORM\Entity
 */
class ListingTranslation
{
    /**
     * @var int
     *
     * @Groups({"listingTranslation"})
     * @Groups("listing")
     * @Groups("mariage")
     * @Groups("listingCategory")
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Groups({"listingTranslation"})
     * @Groups("listing")
     * @Groups("mariage")
     * @Groups("listingCategory")
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @Groups({"listingTranslation"})
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rules", type="text", length=65535, nullable=true)
     */
    private $rules;

    /**
     * @var string|null
     *
     * @Groups({"listingTranslation"})
     * @Groups("mariage")
     * @Groups("listingCategory")
     * @Groups("listing")
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=255, nullable=true)
     */
    private $locale;

    /**
     * @Groups({"listingTranslation"})
     * @ORM\ManyToOne(targetEntity=Listing::class, inversedBy="translation")
     */
    private $translatable;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRules(): ?string
    {
        return $this->rules;
    }

    public function setRules(?string $rules): self
    {
        $this->rules = $rules;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getTranslatable(): ?Listing
    {
        return $this->translatable;
    }

    public function setTranslatable(?Listing $translatable): self
    {
        $this->translatable = $translatable;

        return $this;
    }


}
