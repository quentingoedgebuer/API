<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserImage
 *
 * @ORM\Table(name="user_image", indexes={@ORM\Index(name="IDX_27FFFF07A76ED395", columns={"user_id"}), @ORM\Index(name="position_u_idx", columns={"position"})})
 * @ORM\Entity
 */
class UserImage
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="smallint", nullable=false)
     */
    private $position;

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
