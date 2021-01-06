<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GeoCity
 *
 * @ORM\Table(name="geo_city", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_297C2D343A405C9", columns={"geocoding_id"})}, indexes={@ORM\Index(name="IDX_297C2D34AE80F5DF", columns={"department_id"}), @ORM\Index(name="IDX_297C2D34F92F3E70", columns={"country_id"}), @ORM\Index(name="IDX_297C2D34BD0F409C", columns={"area_id"})})
 * @ORM\Entity
 */
class GeoCity
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

    public function getGeocoding(): ?GeoGeocoding
    {
        return $this->geocoding;
    }

    public function setGeocoding(?GeoGeocoding $geocoding): self
    {
        $this->geocoding = $geocoding;

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
