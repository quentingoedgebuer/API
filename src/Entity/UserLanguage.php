<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserLanguage
 *
 * @ORM\Table(name="user_language", indexes={@ORM\Index(name="IDX_345695B5A76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class UserLanguage
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
     * @ORM\Column(name="code", type="string", length=3, nullable=false)
     */
    private $code;

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
