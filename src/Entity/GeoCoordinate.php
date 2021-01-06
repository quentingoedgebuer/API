<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GeoCoordinate
 *
 * @ORM\Table(name="geo_coordinate", indexes={@ORM\Index(name="IDX_B2E13D99F92F3E70", columns={"country_id"}), @ORM\Index(name="IDX_B2E13D998BAC62AF", columns={"city_id"}), @ORM\Index(name="IDX_B2E13D99BD0F409C", columns={"area_id"}), @ORM\Index(name="coordinate_idx", columns={"lat", "lng"}), @ORM\Index(name="IDX_B2E13D99AE80F5DF", columns={"department_id"})})
 * @ORM\Entity
 */
class GeoCoordinate
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
     * @ORM\Column(name="lat", type="decimal", precision=11, scale=7, nullable=false)
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="lng", type="decimal", precision=11, scale=7, nullable=false)
     */
    private $lng;

    /**
     * @var string|null
     *
     * @ORM\Column(name="zip", type="string", length=30, nullable=true)
     */
    private $zip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="route", type="string", length=200, nullable=true)
     */
    private $route;

    /**
     * @var string|null
     *
     * @ORM\Column(name="street_number", type="string", length=20, nullable=true)
     */
    private $streetNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=false)
     */
    private $address;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    private $createdat;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    private $updatedat;

    /**
     * @var \GeoCity
     *
     * @ORM\ManyToOne(targetEntity="GeoCity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     * })
     */
    private $city;

    /**
     * @var \GeoDepartment
     *
     * @ORM\ManyToOne(targetEntity="GeoDepartment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     * })
     */
    private $department;

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
