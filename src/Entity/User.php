<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8D93D64992FC23A8", columns={"username_canonical"}), @ORM\UniqueConstraint(name="UNIQ_8D93D649A0D96FBF", columns={"email_canonical"})}, indexes={@ORM\Index(name="slug_u_idx", columns={"slug"}), @ORM\Index(name="enabled_idx", columns={"enabled"}), @ORM\Index(name="created_at_u_idx", columns={"createdAt"}), @ORM\Index(name="email_idx", columns={"email"})})
 * @ORM\Entity
 */
class User
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
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="username_canonical", type="string", length=255, nullable=false)
     */
    private $usernameCanonical;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="email_canonical", type="string", length=255, nullable=false)
     */
    private $emailCanonical;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=false)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var bool
     *
     * @ORM\Column(name="locked", type="boolean", nullable=false)
     */
    private $locked;

    /**
     * @var bool
     *
     * @ORM\Column(name="expired", type="boolean", nullable=false)
     */
    private $expired;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="expires_at", type="datetime", nullable=true)
     */
    private $expiresAt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="confirmation_token", type="string", length=255, nullable=true)
     */
    private $confirmationToken;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="password_requested_at", type="datetime", nullable=true)
     */
    private $passwordRequestedAt;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array", length=0, nullable=false)
     */
    private $roles;

    /**
     * @var bool
     *
     * @ORM\Column(name="credentials_expired", type="boolean", nullable=false)
     */
    private $credentialsExpired;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="credentials_expire_at", type="datetime", nullable=true)
     */
    private $credentialsExpireAt;

    /**
     * @var int
     *
     * @ORM\Column(name="person_type", type="smallint", nullable=false)
     */
    private $personType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="company_name", type="string", length=100, nullable=true)
     */
    private $companyName;

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
     * @var string|null
     *
     * @ORM\Column(name="phone_prefix", type="string", length=6, nullable=true)
     */
    private $phonePrefix;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=16, nullable=true)
     */
    private $phone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date", nullable=false)
     */
    private $birthday;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nationality", type="string", length=3, nullable=true)
     */
    private $nationality;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country_of_residence", type="string", length=3, nullable=true)
     */
    private $countryOfResidence;

    /**
     * @var string|null
     *
     * @ORM\Column(name="profession", type="string", length=50, nullable=true)
     */
    private $profession;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iban", type="string", length=45, nullable=true)
     */
    private $iban;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bic", type="string", length=25, nullable=true)
     */
    private $bic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bank_owner_name", type="string", length=100, nullable=true)
     */
    private $bankOwnerName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bank_owner_address", type="string", length=255, nullable=true)
     */
    private $bankOwnerAddress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="annual_income", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $annualIncome;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="phone_verified", type="boolean", nullable=true)
     */
    private $phoneVerified;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="email_verified", type="boolean", nullable=true)
     */
    private $emailVerified;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="id_card_verified", type="boolean", nullable=true)
     */
    private $idCardVerified;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nb_bookings_offerer", type="smallint", nullable=true)
     */
    private $nbBookingsOfferer;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nb_bookings_asker", type="smallint", nullable=true)
     */
    private $nbBookingsAsker;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fee_as_asker", type="smallint", nullable=true)
     */
    private $feeAsAsker;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fee_as_offerer", type="smallint", nullable=true)
     */
    private $feeAsOfferer;

    /**
     * @var int|null
     *
     * @ORM\Column(name="average_rating_as_asker", type="smallint", nullable=true)
     */
    private $averageRatingAsAsker;

    /**
     * @var int|null
     *
     * @ORM\Column(name="average_rating_as_offerer", type="smallint", nullable=true)
     */
    private $averageRatingAsOfferer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mother_tongue", type="string", length=5, nullable=true)
     */
    private $motherTongue;

    /**
     * @var int|null
     *
     * @ORM\Column(name="answer_delay", type="integer", nullable=true)
     */
    private $answerDelay;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="user")
     * @ORM\JoinTable(name="user_group",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     *   }
     * )
     */
    private $group;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->group = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
