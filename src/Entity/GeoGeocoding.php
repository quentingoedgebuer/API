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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLat(): ?string
    {
        return $this->lat;
    }

    public function setLat(string $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?string
    {
        return $this->lng;
    }

    public function setLng(string $lng): self
    {
        $this->lng = $lng;

        return $this;
    }

    public function getViewport(): ?string
    {
        return $this->viewport;
    }

    public function setViewport(string $viewport): self
    {
        $this->viewport = $viewport;

        return $this;
    }

    public function getAddressType(): ?string
    {
        return $this->addressType;
    }

    public function setAddressType(string $addressType): self
    {
        $this->addressType = $addressType;

        return $this;
    }


}
