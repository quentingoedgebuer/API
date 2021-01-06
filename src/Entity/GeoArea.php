<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GeoArea
 *
 * @ORM\Table(name="geo_area", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_D3B312683A405C9", columns={"geocoding_id"})}, indexes={@ORM\Index(name="IDX_D3B31268F92F3E70", columns={"country_id"})})
 * @ORM\Entity
 */
class GeoArea
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
     * @var \GeoGeocoding
     *
     * @ORM\ManyToOne(targetEntity="GeoGeocoding")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="geocoding_id", referencedColumnName="id")
     * })
     */
    private $geocoding;

    /**
     * @var \GeoCountry
     *
     * @ORM\ManyToOne(targetEntity="GeoCountry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * })
     */
    private $country;


}
