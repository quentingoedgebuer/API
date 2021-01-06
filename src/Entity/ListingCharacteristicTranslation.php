<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListingCharacteristicTranslation
 *
 * @ORM\Table(name="listing_characteristic_translation", uniqueConstraints={@ORM\UniqueConstraint(name="listing_characteristic_translation_unique_translation", columns={"translatable_id", "locale"})}, indexes={@ORM\Index(name="IDX_945E8F882C2AC5D3", columns={"translatable_id"})})
 * @ORM\Entity
 */
class ListingCharacteristicTranslation
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
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=255, nullable=false)
     */
    private $locale;

    /**
     * @var \ListingCharacteristic
     *
     * @ORM\ManyToOne(targetEntity="ListingCharacteristic")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="translatable_id", referencedColumnName="id")
     * })
     */
    private $translatable;


}
