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

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getRoute(): ?string
    {
        return $this->route;
    }

    public function setRoute(?string $route): self
    {
        $this->route = $route;

        return $this;
    }

    public function getStreetNumber(): ?string
    {
        return $this->streetNumber;
    }

    public function setStreetNumber(?string $streetNumber): self
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCreatedat(): ?\DateTimeInterface
    {
        return $this->createdat;
    }

    public function setCreatedat(?\DateTimeInterface $createdat): self
    {
        $this->createdat = $createdat;

        return $this;
    }

    public function getUpdatedat(): ?\DateTimeInterface
    {
        return $this->updatedat;
    }

    public function setUpdatedat(?\DateTimeInterface $updatedat): self
    {
        $this->updatedat = $updatedat;

        return $this;
    }

    public function getCity(): ?GeoCity
    {
        return $this->city;
    }

    public function setCity(?GeoCity $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getDepartment(): ?GeoDepartment
    {
        return $this->department;
    }

    public function setDepartment(?GeoDepartment $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getArea(): ?GeoArea
    {
        return $this->area;
    }

    public function setArea(?GeoArea $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getCountry(): ?GeoCountry
    {
        return $this->country;
    }

    public function setCountry(?GeoCountry $country): self
    {
        $this->country = $country;

        return $this;
    }


}
