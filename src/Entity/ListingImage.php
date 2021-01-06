<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListingImage
 *
 * @ORM\Table(name="listing_image", indexes={@ORM\Index(name="IDX_33D3DCD3D4619D1A", columns={"listing_id"}), @ORM\Index(name="position_li_idx", columns={"position"})})
 * @ORM\Entity
 */
class ListingImage
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
     * @var int
     *
     * @ORM\Column(name="position", type="smallint", nullable=false)
     */
    private $position;

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
