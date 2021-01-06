<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListingListingCategory
 *
 * @ORM\Table(name="listing_listing_category", indexes={@ORM\Index(name="IDX_1AFD54EAD4619D1A", columns={"listing_id"}), @ORM\Index(name="IDX_1AFD54EA455844B0", columns={"listing_category_id"})})
 * @ORM\Entity
 */
class ListingListingCategory
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
     * @var \ListingCategory
     *
     * @ORM\ManyToOne(targetEntity="ListingCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="listing_category_id", referencedColumnName="id")
     * })
     */
    private $listingCategory;

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
