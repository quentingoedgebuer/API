<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GeoAreaTranslation
 *
 * @ORM\Table(name="geo_area_translation", uniqueConstraints={@ORM\UniqueConstraint(name="geo_area_translation_unique_translation", columns={"translatable_id", "locale"})}, indexes={@ORM\Index(name="name_gat_idx", columns={"name"}), @ORM\Index(name="IDX_7A5BDDAB2C2AC5D3", columns={"translatable_id"})})
 * @ORM\Entity
 */
class GeoAreaTranslation
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
     * @var \GeoArea
     *
     * @ORM\ManyToOne(targetEntity="GeoArea")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="translatable_id", referencedColumnName="id")
     * })
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

    public function getTranslatable(): ?GeoArea
    {
        return $this->translatable;
    }

    public function setTranslatable(?GeoArea $translatable): self
    {
        $this->translatable = $translatable;

        return $this;
    }


}
