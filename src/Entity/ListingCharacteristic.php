<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListingCharacteristic
 *
 * @ORM\Table(name="listing_characteristic", indexes={@ORM\Index(name="IDX_97E210EC3A0F8087", columns={"listing_characteristic_type_id"}), @ORM\Index(name="IDX_97E210ECE4714E36", columns={"listing_characteristic_group_id"}), @ORM\Index(name="position_idx", columns={"position"})})
 * @ORM\Entity
 */
class ListingCharacteristic
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

    /**
     * @var \ListingCharacteristicGroup
     *
     * @ORM\ManyToOne(targetEntity="ListingCharacteristicGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="listing_characteristic_group_id", referencedColumnName="id")
     * })
     */
    private $listingCharacteristicGroup;


}
