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


}
