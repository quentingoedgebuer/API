<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GeoCountry
 *
 * @ORM\Table(name="geo_country", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_E46544643A405C9", columns={"geocoding_id"})}, indexes={@ORM\Index(name="code_idx", columns={"code"})})
 * @ORM\Entity
 */
class GeoCountry
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
     * @ORM\Column(name="code", type="string", length=3, nullable=false)
     */
    private $code;

    /**
     * @var \GeoGeocoding
     *
     * @ORM\ManyToOne(targetEntity="GeoGeocoding")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="geocoding_id", referencedColumnName="id")
     * })
     */
    private $geocoding;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
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


}
