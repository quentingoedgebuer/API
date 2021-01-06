<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GeoGeocoding
 *
 * @ORM\Table(name="geo_geocoding")
 * @ORM\Entity
 */
class GeoGeocoding
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
     * @var string
     *
     * @ORM\Column(name="viewport", type="string", length=100, nullable=false)
     */
    private $viewport;

    /**
     * @var string
     *
     * @ORM\Column(name="address_type", type="string", length=150, nullable=false)
     */
    private $addressType;


}
