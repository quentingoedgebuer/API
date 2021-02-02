<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Repository\ListingListingCategoryRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * ListingListingCategory
 *
 * @ApiResource(normalizationContext={"groups"={"listing"}})
 * @ApiFilter(SearchFilter::class, properties={*})
 * @ORM\Table(name="listing_listing_category", indexes={@ORM\Index(name="IDX_1AFD54EAD4619D1A", columns={"listing_id"}), @ORM\Index(name="IDX_1AFD54EA455844B0", columns={"listing_category_id"})})
 * @ORM\Entity(repositoryClass=ListingListingCategoryRepository::class)
 */
class ListingListingCategory
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @Groups({"listing"})
     * @Groups("listingCategory")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \ListingCategory
     *
     * @ORM\ManyToOne(targetEntity="ListingCategory")
     * @Groups({"listing"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="listing_category_id", referencedColumnName="id")
     * })
     */
    private $listingCategory;

    /**
     * @var \Listing
     *
     * @ORM\ManyToOne(targetEntity="Listing")
     * @Groups({"listing"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="listing_id", referencedColumnName="id")
     * })
     */
    private $listing;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getListingCategory(): ?ListingCategory
    {
        return $this->listingCategory;
    }

    public function setListingCategory(?ListingCategory $listingCategory): self
    {
        $this->listingCategory = $listingCategory;

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
