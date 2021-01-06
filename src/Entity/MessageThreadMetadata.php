<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessageThreadMetadata
 *
 * @ORM\Table(name="message_thread_metadata", indexes={@ORM\Index(name="IDX_38FC293EE2904019", columns={"thread_id"}), @ORM\Index(name="IDX_38FC293E9D1C3019", columns={"participant_id"})})
 * @ORM\Entity
 */
class MessageThreadMetadata
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
     * @var bool
     *
     * @ORM\Column(name="is_deleted", type="boolean", nullable=false)
     */
    private $isDeleted;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_participant_message_date", type="datetime", nullable=true)
     */
    private $lastParticipantMessageDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_message_date", type="datetime", nullable=true)
     */
    private $lastMessageDate;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="participant_id", referencedColumnName="id")
     * })
     */
    private $participant;

    /**
     * @var \MessageThread
     *
     * @ORM\ManyToOne(targetEntity="MessageThread")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="thread_id", referencedColumnName="id")
     * })
     */
    private $thread;


}
