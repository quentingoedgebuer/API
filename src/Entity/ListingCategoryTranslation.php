<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListingCategoryTranslation
 *
 * @ORM\Table(name="listing_category_translation", uniqueConstraints={@ORM\UniqueConstraint(name="listing_category_translation_unique_translation", columns={"translatable_id", "locale"})}, indexes={@ORM\Index(name="name_idx", columns={"name"}), @ORM\Index(name="IDX_606EDC1F2C2AC5D3", columns={"translatable_id"})})
 * @ORM\Entity
 */
class ListingCategoryTranslation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=255, nullable=false)
     */
    private $locale;

    /**
     * @ORM\ManyToOne(targetEntity=ListingCategory::class, inversedBy="listingCategoryTranslations")
     */
    private $translatable;


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

    public function getTranslatable(): ?ListingCategory
    {
        return $this->translatable;
    }

    public function setTranslatable(?ListingCategory $translatable): self
    {
        $this->translatable = $translatable;

        return $this;
    }


}
