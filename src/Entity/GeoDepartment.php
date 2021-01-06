<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GeoDepartment
 *
 * @ORM\Table(name="geo_department", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_B46066043A405C9", columns={"geocoding_id"})}, indexes={@ORM\Index(name="IDX_B4606604F92F3E70", columns={"country_id"}), @ORM\Index(name="IDX_B4606604BD0F409C", columns={"area_id"})})
 * @ORM\Entity
 */
class GeoDepartment
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
     * @var \GeoArea
     *
     * @ORM\ManyToOne(targetEntity="GeoArea")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="area_id", referencedColumnName="id")
     * })
     */
    private $area;

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
