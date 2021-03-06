<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * ListingImage
 * @ApiResource
 * @ApiFilter(SearchFilter::class, properties={*})
 * @ORM\Table(name="listing_image", indexes={@ORM\Index(name="IDX_33D3DCD3D4619D1A", columns={"listing_id"}), @ORM\Index(name="position_li_idx", columns={"position"})})
 * @ORM\Entity
 */
class ListingImage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @Groups("listingCategory")
     * @Groups("listing")
     * @Groups("mariage")
     * @Groups("utilisateur")
     * @Groups("listingTranslation")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Groups("listingCategory")
     * @Groups("listing")
     * @Groups("mariage")
     * @Groups("utilisateur")
     * @Groups("listingTranslation")
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @Groups("listingCategory")
     * @Groups("listing")
     * @Groups("mariage")
     * @Groups("listingTranslation")
     * @ORM\Column(name="position", type="smallint", nullable=false)
     */
    private $position;


    /**
     * @ORM\ManyToOne(targetEntity=Listing::class, inversedBy="ListingImage")
     */
    private $listing;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

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
