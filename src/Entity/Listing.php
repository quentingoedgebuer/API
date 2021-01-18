<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;

/**
 * Listing
 *
 * @ApiResource
 * @ApiFilter(SearchFilter::class, properties={*})
 * @ORM\Table(name="listing", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_CB0048D464D218E", columns={"location_id"})}, indexes={@ORM\Index(name="status_l_idx", columns={"status"}), @ORM\Index(name="min_duration_idx", columns={"min_duration"}), @ORM\Index(name="admin_notation_idx", columns={"admin_notation"}), @ORM\Index(name="IDX_CB0048D4A76ED395", columns={"user_id"}), @ORM\Index(name="price_idx", columns={"price"}), @ORM\Index(name="max_duration_idx", columns={"max_duration"}), @ORM\Index(name="created_at_l_idx", columns={"createdAt"}), @ORM\Index(name="type_idx", columns={"type"}), @ORM\Index(name="average_rating_idx", columns={"average_rating"})})
 * @ORM\Entity
 */
class Listing
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
     * @var int
     *
     * @ORM\Column(name="status", type="smallint", nullable=false)
     */
    private $status;

    /**
     * @var int|null
     *
     * @ORM\Column(name="type", type="smallint", nullable=true)
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $price;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="certified", type="boolean", nullable=true)
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
     * @ORM\Column(name="cancellation_policy", type="smallint", nullable=false)
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
     * @var \ListingLocation
     *
     * @ORM\ManyToOne(targetEntity="ListingLocation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     * })
     */
    private $location;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Mariage", mappedBy="listing")
     */
    private $mariage;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mariage = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Collection|Mariage[]
     */
    public function getMariage(): Collection
    {
        return $this->mariage;
    }

    public function addMariage(Mariage $mariage): self
    {
        if (!$this->mariage->contains($mariage)) {
            $this->mariage[] = $mariage;
            $mariage->addListing($this);
        }

        return $this;
    }

    public function removeMariage(Mariage $mariage): self
    {
        if ($this->mariage->removeElement($mariage)) {
            $mariage->removeListing($this);
        }

        return $this;
    }

}
