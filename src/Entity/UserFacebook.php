<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserFacebook
 *
 * @ORM\Table(name="user_facebook", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8BF92CE0A76ED395", columns={"user_id"})}, indexes={@ORM\Index(name="facebook_id_idx", columns={"facebook_id"})})
 * @ORM\Entity
 */
class UserFacebook
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
     * @ORM\Column(name="facebook_id", type="string", length=100, nullable=false)
     */
    private $facebookId;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=false)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=100, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=100, nullable=false)
     */
    private $firstName;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verified", type="string", length=100, nullable=true)
     */
    private $verified;

    /**
     * @var string|null
     *
     * @ORM\Column(name="location", type="string", length=100, nullable=true)
     */
    private $location;

    /**
     * @var string|null
     *
     * @ORM\Column(name="location_id", type="string", length=100, nullable=true)
     */
    private $locationId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hometown", type="string", length=100, nullable=true)
     */
    private $hometown;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hometown_id", type="string", length=100, nullable=true)
     */
    private $hometownId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gender", type="string", length=20, nullable=true)
     */
    private $gender;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locale", type="string", length=50, nullable=true)
     */
    private $locale;

    /**
     * @var string|null
     *
     * @ORM\Column(name="timezone", type="string", length=100, nullable=true)
     */
    private $timezone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nb_friends", type="string", length=15, nullable=true)
     */
    private $nbFriends;

    /**
     * @var string|null
     *
     * @ORM\Column(name="picture", type="string", length=100, nullable=true)
     */
    private $picture;

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


}
