<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessageThread
 *
 * @ORM\Table(name="message_thread", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_607D18C3301C60", columns={"booking_id"})}, indexes={@ORM\Index(name="IDX_607D18C3174800F", columns={"createdBy_id"}), @ORM\Index(name="IDX_607D18CD4619D1A", columns={"listing_id"})})
 * @ORM\Entity
 */
class MessageThread
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
     * @ORM\Column(name="subject", type="string", length=255, nullable=false)
     */
    private $subject;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdat;

    /**
     * @var bool
     *
     * @ORM\Column(name="isSpam", type="boolean", nullable=false)
     */
    private $isspam;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createdBy_id", referencedColumnName="id")
     * })
     */
    private $createdby;

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
     * @var \Listing
     *
     * @ORM\ManyToOne(targetEntity="Listing")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="listing_id", referencedColumnName="id")
     * })
     */
    private $listing;


}
