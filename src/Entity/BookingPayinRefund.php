<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BookingPayinRefund
 *
 * @ORM\Table(name="booking_payin_refund", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_2CD4E82D3301C60", columns={"booking_id"})}, indexes={@ORM\Index(name="created_at_pr_idx", columns={"createdAt"}), @ORM\Index(name="IDX_2CD4E82DA76ED395", columns={"user_id"}), @ORM\Index(name="status_pr_idx", columns={"status"})})
 * @ORM\Entity
 */
class BookingPayinRefund
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
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=8, scale=0, nullable=false)
     */
    private $amount;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="payed_at", type="datetime", nullable=true)
     */
    private $payedAt;

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
     * @var \Booking
     *
     * @ORM\ManyToOne(targetEntity="Booking")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="booking_id", referencedColumnName="id")
     * })
     */
    private $booking;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;


}
