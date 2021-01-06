<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 *
 * @ORM\Table(name="booking", indexes={@ORM\Index(name="IDX_E00CEDDEA76ED395", columns={"user_id"}), @ORM\Index(name="end_idx", columns={"end"}), @ORM\Index(name="status_idx", columns={"status"}), @ORM\Index(name="alerted_expiring_idx", columns={"alerted_expiring"}), @ORM\Index(name="updated_at_idx", columns={"updatedAt"}), @ORM\Index(name="IDX_E00CEDDED4619D1A", columns={"listing_id"}), @ORM\Index(name="start_time_idx", columns={"start_time"}), @ORM\Index(name="validated_idx", columns={"validated"}), @ORM\Index(name="alerted_imminent_idx", columns={"alerted_imminent"}), @ORM\Index(name="start_idx", columns={"start"}), @ORM\Index(name="end_time_idx", columns={"end_time"}), @ORM\Index(name="new_booking_at_idx", columns={"new_booking_at"}), @ORM\Index(name="created_at_idx", columns={"createdAt"})})
 * @ORM\Entity
 */
class Booking
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
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime", nullable=false)
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime", nullable=false)
     */
    private $end;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_time", type="datetime", nullable=false)
     */
    private $startTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_time", type="datetime", nullable=false)
     */
    private $endTime;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="smallint", nullable=false)
     */
    private $status;

    /**
     * @var bool
     *
     * @ORM\Column(name="validated", type="boolean", nullable=false)
     */
    private $validated;

    /**
     * @var string|null
     *
     * @ORM\Column(name="amount", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $amount;

    /**
     * @var string|null
     *
     * @ORM\Column(name="amount_fee_as_asker", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $amountFeeAsAsker;

    /**
     * @var string|null
     *
     * @ORM\Column(name="amount_fee_as_offerer", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $amountFeeAsOfferer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="amount_total", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $amountTotal;

    /**
     * @var int
     *
     * @ORM\Column(name="cancellation_policy", type="smallint", nullable=false)
     */
    private $cancellationPolicy;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="new_booking_at", type="datetime", nullable=true)
     */
    private $newBookingAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="payed_booking_at", type="datetime", nullable=true)
     */
    private $payedBookingAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="refused_booking_at", type="datetime", nullable=true)
     */
    private $refusedBookingAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="canceled_asker_booking_at", type="datetime", nullable=true)
     */
    private $canceledAskerBookingAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="alerted_expiring", type="boolean", nullable=false)
     */
    private $alertedExpiring;

    /**
     * @var bool
     *
     * @ORM\Column(name="alerted_imminent", type="boolean", nullable=false)
     */
    private $alertedImminent;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", length=65535, nullable=false)
     */
    private $message;

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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Listing
     *
     * @ORM\ManyToOne(targetEntity="Listing")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="listing_id", referencedColumnName="id")
     * })
     */
    private $listing;


}
