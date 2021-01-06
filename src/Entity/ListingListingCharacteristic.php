<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListingListingCharacteristic
 *
 * @ORM\Table(name="listing_listing_characteristic", indexes={@ORM\Index(name="IDX_2FD5B3B6D4619D1A", columns={"listing_id"}), @ORM\Index(name="IDX_2FD5B3B6C27F7D66", columns={"listing_characteristic_id"}), @ORM\Index(name="IDX_2FD5B3B6E3052CD3", columns={"listing_characteristic_value_id"})})
 * @ORM\Entity
 */
class ListingListingCharacteristic
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
     * @var \ListingCharacteristic
     *
     * @ORM\ManyToOne(targetEntity="ListingCharacteristic")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="listing_characteristic_id", referencedColumnName="id")
     * })
     */
    private $listingCharacteristic;

    /**
     * @var \Listing
     *
     * @ORM\ManyToOne(targetEntity="Listing")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="listing_id", referencedColumnName="id")
     * })
     */
    private $listing;

    /**
     * @var \ListingCharacteristicValue
     *
     * @ORM\ManyToOne(targetEntity="ListingCharacteristicValue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="listing_characteristic_value_id", referencedColumnName="id")
     * })
     */
    private $listingCharacteristicValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getListingCharacteristic(): ?ListingCharacteristic
    {
        return $this->listingCharacteristic;
    }

    public function setListingCharacteristic(?ListingCharacteristic $listingCharacteristic): self
    {
        $this->listingCharacteristic = $listingCharacteristic;

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

    public function getListingCharacteristicValue(): ?ListingCharacteristicValue
    {
        return $this->listingCharacteristicValue;
    }

    public function setListingCharacteristicValue(?ListingCharacteristicValue $listingCharacteristicValue): self
    {
        $this->listingCharacteristicValue = $listingCharacteristicValue;

        return $this;
    }


}
