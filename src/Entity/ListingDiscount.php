<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListingDiscount
 *
 * @ORM\Table(name="listing_discount", uniqueConstraints={@ORM\UniqueConstraint(name="discount_unique", columns={"listing_id", "from_quantity"})}, indexes={@ORM\Index(name="discount_idx", columns={"discount"}), @ORM\Index(name="from_quantity_idx", columns={"from_quantity"}), @ORM\Index(name="IDX_79CD674D4619D1A", columns={"listing_id"})})
 * @ORM\Entity
 */
class ListingDiscount
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
     * @ORM\Column(name="discount", type="smallint", nullable=false)
     */
    private $discount;

    /**
     * @var int
     *
     * @ORM\Column(name="from_quantity", type="smallint", nullable=false)
     */
    private $fromQuantity;

    /**
     * @var \Listing
     *
     * @ORM\ManyToOne(targetEntity="Listing")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="listing_id", referencedColumnName="id")
     * })
     */
    private $listing;


}
