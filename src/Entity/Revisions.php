<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Revisions
 *
 * @ORM\Table(name="revisions")
 * @ORM\Entity
 */
class Revisions
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
     * @ORM\Column(name="timestamp", type="datetime", nullable=false)
     */
    private $timestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     */
    private $username;


}
