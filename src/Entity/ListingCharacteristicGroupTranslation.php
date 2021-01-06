<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListingCharacteristicGroupTranslation
 *
 * @ORM\Table(name="listing_characteristic_group_translation", uniqueConstraints={@ORM\UniqueConstraint(name="listing_characteristic_group_translation_unique_translation", columns={"translatable_id", "locale"})}, indexes={@ORM\Index(name="IDX_6C8407162C2AC5D3", columns={"translatable_id"})})
 * @ORM\Entity
 */
class ListingCharacteristicGroupTranslation
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=255, nullable=false)
     */
    private $locale;

    /**
     * @var \ListingCharacteristicGroup
     *
     * @ORM\ManyToOne(targetEntity="ListingCharacteristicGroup")
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

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getTranslatable(): ?ListingCharacteristicGroup
    {
        return $this->translatable;
    }

    public function setTranslatable(?ListingCharacteristicGroup $translatable): self
    {
        $this->translatable = $translatable;

        return $this;
    }


}
