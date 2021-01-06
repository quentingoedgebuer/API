<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Listing
 *
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

}
