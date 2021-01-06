<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListingLocation
 *
 * @ORM\Table(name="listing_location", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_B8E2EBB1D4619D1A", columns={"listing_id"})}, indexes={@ORM\Index(name="IDX_B8E2EBB198BBE953", columns={"coordinate_id"})})
 * @ORM\Entity
 */
class ListingLocation
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
     * @ORM\Column(name="country", type="string", length=3, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=75, nullable=false)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="zip", type="string", length=20, nullable=true)
     */
    private $zip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="route", type="string", length=120, nullable=true)
     */
    private $route;

    /**
     * @var string|null
     *
     * @ORM\Column(name="street_number", type="string", length=20, nullable=true)
     */
    private $streetNumber;

    /**
     * @var \GeoCoordinate
     *
     * @ORM\ManyToOne(targetEntity="GeoCoordinate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="coordinate_id", referencedColumnName="id")
     * })
     */
    private $coordinate;

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
