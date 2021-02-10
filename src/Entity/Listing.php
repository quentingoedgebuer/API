<?php

namespace App\Entity;

use App\Repository\ListingRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;

/**
 * Listing
 *
 * @ApiResource(normalizationContext={"groups"={"listing"}},attributes={"pagination_items_per_page"=16})
 * @ApiFilter(SearchFilter::class, properties={*})
 * @ORM\Table(name="listing", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_CB0048D464D218E", columns={"location_id"})}, indexes={@ORM\Index(name="status_l_idx", columns={"status"}), @ORM\Index(name="min_duration_idx", columns={"min_duration"}), @ORM\Index(name="admin_notation_idx", columns={"admin_notation"}), @ORM\Index(name="IDX_CB0048D4A76ED395", columns={"user_id"}), @ORM\Index(name="price_idx", columns={"price"}), @ORM\Index(name="max_duration_idx", columns={"max_duration"}), @ORM\Index(name="created_at_l_idx", columns={"createdAt"}), @ORM\Index(name="type_idx", columns={"type"}), @ORM\Index(name="average_rating_idx", columns={"average_rating"})})
 * @ORM\Entity(repositoryClass=ListingRepository::class)
 */
class Listing
{
    /**
     * @var int
     *
     * @Groups("mariage")
     * @Groups({"listing"})
     * @Groups("utilisateur")
     * @Groups("listingCategory")
     * @Groups("listingTranslation")
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="smallint", nullable=true)
     */
    private $status;

    /**
     * @var int|null
     *
     * @Groups("mariage")
     * @Groups("listingCategory")
     * @Groups({"listing"})
     * @Groups("utilisateur")
     * @Groups("listingTranslation")
     * @ORM\Column(name="type", type="smallint", nullable=true)
     */
    private $type;

    /**
     * @var string|null
     *
     * @Groups("mariage")
     * @Groups("listingCategory")
     * @Groups({"listing"})
     * @Groups("utilisateur")
     * @Groups("listingTranslation")
     * @ORM\Column(name="price", type="decimal", precision=8, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var bool|null
     *
     * @Groups("mariage")
     * @Groups("listingCategory")
     * @Groups("utilisateur")
     * @Groups({"listing"})
     * @Groups("listingTranslation")
     * @ORM\Column(name="certified", type="boolean", nullable=false)
     */
    private $certified;

    /**
     * @var int|null
     *
     * @ORM\Column(name="min_duration", type="smallint", nullable=true) 
     */
    private $minDuration;

    /**
     * @var int|null
     *
     * @ORM\Column(name="max_duration", type="smallint", nullable=true)
     */
    private $maxDuration;

    /**
     * @var int
     *
     * @ORM\Column(name="cancellation_policy", type="smallint", nullable=true)
     */
    private $cancellationPolicy;

    /**
     * @var int|null
     *
     * @ORM\Column(name="average_rating", type="smallint", nullable=true)
     */
    private $averageRating;

    /**
     * @var int|null
     *
     * @ORM\Column(name="comment_count", type="integer", nullable=true)
     */
    private $commentCount;

    /**
     * @var string|null
     *
     * @ORM\Column(name="admin_notation", type="decimal", precision=3, scale=1, nullable=true)
     */
    private $adminNotation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="availabilities_updated_at", type="datetime", nullable=true)
     */
    private $availabilitiesUpdatedAt;

    /**
     * @var \DateTime|null
     *
     * @Groups({"listing"})
     * @Groups("listingTranslation")
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    private $createdat;

    /**
     * @var \DateTime|null
     *
     * @Groups("listingCategory")
     * @Groups("listingTranslation")
     * @Groups({"listing"})
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    private $updatedat;

    /**
     * @var \ListingLocation
     *
     * @Groups({"listing"})
     * @Groups("mariage")
     * @Groups("listingCategory")
     * @Groups("listingTranslation")
     * @ORM\ManyToOne(targetEntity="ListingLocation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     * })
     */
    private $location;

    /**
     * @var \User
     *
     * @Groups({"listing"})
     * @Groups("listingCategory")
     * @Groups("mariage")
     * @Groups("listingTranslation")
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @Groups({"listing"})
     * @Groups("utilisateur")
     * @Groups("listingCategory")
     * @Groups("mariage")
     * @Groups("listingTranslation")
     * @ORM\OneToMany(targetEntity=ListingImage::class, mappedBy="listing")
     */
    private $ListingImage;
    
    /**
     * @Groups({"listing"})
     * @Groups("listingCategory")
     * @Groups("listingTranslation")
     * @ORM\JoinTable(name="participations")
     * @ORM\ManyToMany(targetEntity=Mariage::class, inversedBy="listings")
     */
    private $mariages;

    /**
     * @Groups({"listing"})
     * @Groups("mariage")
     * @Groups("listingTranslation")
     * @ORM\ManyToMany(targetEntity=ListingCategory::class, inversedBy="listings")
     */
    private $ListingCategory;

    /**
     * @Groups({"listing"})
     * @Groups("mariage")
     * @Groups("listingCategory")
     * @ORM\OneToMany(targetEntity=ListingTranslation::class, mappedBy="translatable")
     */
    private $translation;

    public function __construct()
    {
        $this->ListingImage = new ArrayCollection();
        $this->mariages = new ArrayCollection();
        $this->ListingCategory = new ArrayCollection();
        $this->translation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCertified(): ?bool
    {
        return $this->certified;
    }

    public function setCertified(?bool $certified): self
    {
        $this->certified = $certified;

        return $this;
    }

    public function getMinDuration(): ?int
    {
        return $this->minDuration;
    }

    public function setMinDuration(?int $minDuration): self
    {
        $this->minDuration = $minDuration;

        return $this;
    }

    public function getMaxDuration(): ?int
    {
        return $this->maxDuration;
    }

    public function setMaxDuration(?int $maxDuration): self
    {
        $this->maxDuration = $maxDuration;

        return $this;
    }

    public function getCancellationPolicy(): ?int
    {
        return $this->cancellationPolicy;
    }

    public function setCancellationPolicy(int $cancellationPolicy): self
    {
        $this->cancellationPolicy = $cancellationPolicy;

        return $this;
    }

    public function getAverageRating(): ?int
    {
        return $this->averageRating;
    }

    public function setAverageRating(?int $averageRating): self
    {
        $this->averageRating = $averageRating;

        return $this;
    }

    public function getCommentCount(): ?int
    {
        return $this->commentCount;
    }

    public function setCommentCount(?int $commentCount): self
    {
        $this->commentCount = $commentCount;

        return $this;
    }

    public function getAdminNotation(): ?string
    {
        return $this->adminNotation;
    }

    public function setAdminNotation(?string $adminNotation): self
    {
        $this->adminNotation = $adminNotation;

        return $this;
    }

    public function getAvailabilitiesUpdatedAt(): ?\DateTimeInterface
    {
        return $this->availabilitiesUpdatedAt;
    }

    public function setAvailabilitiesUpdatedAt(?\DateTimeInterface $availabilitiesUpdatedAt): self
    {
        $this->availabilitiesUpdatedAt = $availabilitiesUpdatedAt;

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

    public function getLocation(): ?ListingLocation
    {
        return $this->location;
    }

    public function setLocation(?ListingLocation $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|ListingImage[]
     */
    public function getListingImage(): Collection
    {
        return $this->ListingImage;
    }

    public function addListingImage(ListingImage $listingImage): self
    {
        if (!$this->ListingImage->contains($listingImage)) {
            $this->ListingImage[] = $listingImage;
            $listingImage->setListing($this);
        }

        return $this;
    }

    public function removeListingImage(ListingImage $listingImage): self
    {
        if ($this->ListingImage->removeElement($listingImage)) {
            // set the owning side to null (unless already changed)
            if ($listingImage->getListing() === $this) {
                $listingImage->setListing(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Mariage[]
     */
    public function getMariages(): Collection
    {
        return $this->mariages;
    }

    public function addMariage(Mariage $mariage): self
    {
        if (!$this->mariages->contains($mariage)) {
            $this->mariages[] = $mariage;
        }

        return $this;
    }

    public function removeMariage(Mariage $mariage): self
    {
        $this->mariages->removeElement($mariage);

        return $this;
    }

    /**
     * @return Collection|ListingCategory[]
     */
    public function getListingCategory(): Collection
    {
        return $this->ListingCategory;
    }

    public function addListingCategory(ListingCategory $listingCategory): self
    {
        if (!$this->ListingCategory->contains($listingCategory)) {
            $this->ListingCategory[] = $listingCategory;
        }

        return $this;
    }

    public function removeListingCategory(ListingCategory $listingCategory): self
    {
        $this->ListingCategory->removeElement($listingCategory);

        return $this;
    }

    /**
     * @return Collection|ListingTranslation[]
     */
    public function getTranslation(): Collection
    {
        return $this->translation;
    }

    public function addTranslation(ListingTranslation $translation): self
    {
        if (!$this->translation->contains($translation)) {
            $this->translation[] = $translation;
            $translation->setTranslatable($this);
        }

        return $this;
    }

    public function removeTranslation(ListingTranslation $translation): self
    {
        if ($this->translation->removeElement($translation)) {
            // set the owning side to null (unless already changed)
            if ($translation->getTranslatable() === $this) {
                $translation->setTranslatable(null);
            }
        }

        return $this;
    }

}
