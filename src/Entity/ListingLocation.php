<?php

namespace App\Entity;

use App\Repository\ListingLocationRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;

/**
 * ListingLocation
 *
 * @ORM\Table(name="listing_location", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_B8E2EBB1D4619D1A", columns={"listing_id"})}, indexes={@ORM\Index(name="IDX_B8E2EBB198BBE953", columns={"coordinate_id"})})
 * @ORM\Entity(repositoryClass=ListingLocationRepository::class)
 */
class ListingLocation
{
    /**
     * @var int
     *
     * @Groups("mariage")
     * @Groups("listing")
     * @Groups("listingCategory")
     * @Groups("listingTranslation")
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Groups("listing")
     * @Groups("listingTranslation")
     * @ORM\Column(name="country", type="string", length=3, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @Groups("mariage")
     * @Groups("listing")
     * @Groups("listingCategory")
     * @Groups("listingTranslation")
     * @ORM\Column(name="city", type="string", length=75, nullable=false)
     */
    private $city;

    /**
     * @var string|null
     *
     * @Groups("listing")
     * @Groups("listingTranslation")
     * @ORM\Column(name="zip", type="string", length=20, nullable=true)
     */
    private $zip;

    /**
     * @var string|null
     *
     * @Groups("listing")
     * @Groups("listingTranslation")
     * @ORM\Column(name="route", type="string", length=120, nullable=true)
     */
    private $route;

    /**
     * @var string|null
     *
     * @Groups("listing")
     * @Groups("listingTranslation")
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

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

    public function getCoordinate(): ?GeoCoordinate
    {
        return $this->coordinate;
    }

    public function setCoordinate(?GeoCoordinate $coordinate): self
    {
        $this->coordinate = $coordinate;

        return $this;
    }

    public function getListing(): ?Listing
    {
        return $this->listing;
    }

    public function setListing(?Listing $listing): self
    {
        $this->listing = $listing;

        return $this;
    }


}
