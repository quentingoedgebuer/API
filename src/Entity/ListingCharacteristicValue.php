<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListingCharacteristicValue
 *
 * @ORM\Table(name="listing_characteristic_value", indexes={@ORM\Index(name="IDX_1203DF153A0F8087", columns={"listing_characteristic_type_id"}), @ORM\Index(name="position_lcv_idx", columns={"position"})})
 * @ORM\Entity
 */
class ListingCharacteristicValue
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
     * @var int
     *
     * @ORM\Column(name="position", type="smallint", nullable=false)
     */
    private $position;

    /**
     * @var \ListingCharacteristicType
     *
     * @ORM\ManyToOne(targetEntity="ListingCharacteristicType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="listing_characteristic_type_id", referencedColumnName="id")
     * })
     */
    private $listingCharacteristicType;


}
