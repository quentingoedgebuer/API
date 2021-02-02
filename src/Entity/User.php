<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 * @ApiResource(normalizationContext={"groups"={"utilisateur"}})
 * @ApiFilter(SearchFilter::class, properties={"companyName": "partial", "profession": "partial", "personType": "exact", "createdat": "exact"})
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8D93D64992FC23A8", columns={"username_canonical"}), @ORM\UniqueConstraint(name="UNIQ_8D93D649A0D96FBF", columns={"email_canonical"})}, indexes={@ORM\Index(name="slug_u_idx", columns={"slug"}), @ORM\Index(name="enabled_idx", columns={"enabled"}), @ORM\Index(name="created_at_u_idx", columns={"createdAt"}), @ORM\Index(name="email_idx", columns={"email"})})
 * @ORM\Entity
 * 
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @Groups("lesListing")
     * @Groups({"utilisateur"})
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Groups("lesListing")
     * @Groups({"utilisateur"})
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     * 
     */
    private $username;

    /**
     * @var string
     *
     * @Groups("lesListing")
     *
     * @ORM\Column(name="username_canonical", type="string", length=255, nullable=true)
     * 
     */
    private $usernameCanonical;

    /**
     * @var string
     *
     * @Groups("lesListing")
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="email_canonical", type="string", length=255, nullable=true)
     *
     */
    private $emailCanonical;

    /**
     * @var bool
     *
     * @Groups("lesListing")
     * @Groups({"utilisateur"})
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true)
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     *
     */
    private $salt;

    /**
     * @var string
     *
     * @Groups("lesListing")
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var \DateTime|null
     *
     * @Groups("lesListing")
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var bool
     *
     * @Groups("lesListing")
     *
     * @ORM\Column(name="locked", type="boolean", nullable=true)
     */
    private $locked;

    /**
     * @var bool
     *
     *
     * @ORM\Column(name="expired", type="boolean", nullable=true)
     */
    private $expired;

    /**
     * @var \DateTime|null
     *
     *
     * @Groups({"utilisateur"})
     * @ORM\Column(name="expires_at", type="datetime", nullable=true)
     */
    private $expiresAt;

    /**
     * @var string|null
     *
     * @Groups("lesListing")
     *
     * @ORM\Column(name="confirmation_token", type="string", length=255, nullable=true)
     */
    private $confirmationToken;

    /**
     * @var \DateTime|null
     *
     * @Groups("lesListing")
     *
     * @ORM\Column(name="password_requested_at", type="datetime", nullable=true)
     */
    private $passwordRequestedAt;

    /**
     * @var array
     *
     * @Groups("lesListing")
     *
     * @ORM\Column(name="roles", type="array", length=0, nullable=false)
     */
    private $roles;

    /**
     * @var bool
     *
     *
     * @ORM\Column(name="credentials_expired", type="boolean", nullable=true)
     */
    private $credentialsExpired;

    /**
     * @var \DateTime|null
     *
     *
     * @ORM\Column(name="credentials_expire_at", type="datetime", nullable=true)
     */
    private $credentialsExpireAt;

    /**
     * @var int
     *
     * @Groups("lesListing")
     * @Groups({"utilisateur"})
     * @ORM\Column(name="person_type", type="smallint", nullable=false)
     */
    private $personType;

    /**
     * @var string|null
     *
     * @Groups("lesListing")
     * @Groups("mariage")
     * @Groups({"utilisateur"})
     *
     * @ORM\Column(name="company_name", type="string", length=100, nullable=true)
     */
    private $companyName;

    /**
     * @var string
     *
     * @Groups("lesListing")
     *
     * @ORM\Column(name="last_name", type="string", length=100, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @Groups("lesListing")
     *
     * @ORM\Column(name="first_name", type="string", length=100, nullable=false)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @Groups("lesListing")
     *
     * @ORM\Column(name="phone_prefix", type="string", length=6, nullable=true)
     */
    private $phonePrefix;

    /**
     * @var string|null
     *
     * @Groups("lesListing")
     *
     * @ORM\Column(name="phone", type="string", length=16, nullable=true)
     */
    private $phone;

    /**
     * @var \DateTime
     *
     * @Groups("lesListing")
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;

    /**
     * @var string|null
     *
     * @Groups("lesListing")
     * @Groups("mariage")
     * @Groups({"utilisateur"})
     *
     * @ORM\Column(name="nationality", type="string", length=3, nullable=true)
     */
    private $nationality;

    /**
     * @var string|null
     *
     * @Groups("lesListing")
     *
     * @ORM\Column(name="country_of_residence", type="string", length=3, nullable=true)
     */
    private $countryOfResidence;

    /**
     * @var string|null
     *
     * @Groups("lesListing")
     * @Groups("mariage")
     * @Groups({"utilisateur"})
     *
     * @ORM\Column(name="profession", type="string", length=50, nullable=false)
     */
    private $profession;

    /**
     * @var string|null
     *
     *
     * @ORM\Column(name="iban", type="string", length=45, nullable=true)
     */
    private $iban;

    /**
     * @var string|null
     *
     *
     * @ORM\Column(name="bic", type="string", length=25, nullable=true)
     */
    private $bic;

    /**
     * @var string|null
     *
     *
     * @ORM\Column(name="bank_owner_name", type="string", length=100, nullable=true)
     */
    private $bankOwnerName;

    /**
     * @var string|nul
     *
     * @ORM\Column(name="bank_owner_address", type="string", length=255, nullable=true)
     */
    private $bankOwnerAddress;

    /**
     * @var string|null
     *
     *
     * @ORM\Column(name="annual_income", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $annualIncome;

    /**
     * @var bool|null
     *
     *
     * @ORM\Column(name="phone_verified", type="boolean", nullable=true)
     */
    private $phoneVerified;

    /**
     * @var bool|null
     *
     *
     * @ORM\Column(name="email_verified", type="boolean", nullable=true)
     */
    private $emailVerified;

    /**
     * @var bool|null
     *
     *
     * @ORM\Column(name="id_card_verified", type="boolean", nullable=true)
     */
    private $idCardVerified;

    /**
     * @var int|null
     *
     *
     * @ORM\Column(name="nb_bookings_offerer", type="smallint", nullable=true)
     */
    private $nbBookingsOfferer;

    /**
     * @var int|null
     *
     *
     * @ORM\Column(name="nb_bookings_asker", type="smallint", nullable=true)
     */
    private $nbBookingsAsker;

    /**
     * @var int|null
     *
     *
     * @ORM\Column(name="fee_as_asker", type="smallint", nullable=true)
     */
    private $feeAsAsker;

    /**
     * @var int|null
     *
     *
     * @ORM\Column(name="fee_as_offerer", type="smallint", nullable=true)
     */
    private $feeAsOfferer;

    /**
     * @var int|null
     *
     *
     * @ORM\Column(name="average_rating_as_asker", type="smallint", nullable=true)
     */
    private $averageRatingAsAsker;

    /**
     * @var int|null
     *
     *
     * @ORM\Column(name="average_rating_as_offerer", type="smallint", nullable=true)
     */
    private $averageRatingAsOfferer;

    /**
     * @var string|null
     *
     *
     * @ORM\Column(name="mother_tongue", type="string", length=5, nullable=true)
     */
    private $motherTongue;

    /**
     * @var int|null
     *
     *
     * @ORM\Column(name="answer_delay", type="integer", nullable=true)
     */
    private $answerDelay;

    /**
     * @var string|null
     *
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var \DateTime|null
     *
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    private $createdat;

    /**
     * @var \DateTime|null
     *
     * @Groups("lesListing")
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    private $updatedat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="user")
     *
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
     * @ORM\OneToMany(targetEntity=UserAddress::class, mappedBy="user")
     * @Groups("lesListing")
     * @Groups("mariage")
     * @Groups("utilisateur")
     *
     */
    private $addresses;

    /**
     * @Groups("lesListing")
     * @Groups("mariage")
     * @Groups({"utilisateur"})
     * @ORM\OneToMany(targetEntity=UserImage::class, mappedBy="user")
     */
    private $images;

    /**
     *
     * @ORM\OneToMany(targetEntity=Listing::class, mappedBy="user")
     * @Groups({"utilisateur"})
     */
    private $Listing;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->group = new \Doctrine\Common\Collections\ArrayCollection();
        $this->addresses = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->Listing = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getUsernameCanonical(): ?string
    {
        return $this->usernameCanonical;
    }

    public function setUsernameCanonical(string $usernameCanonical): self
    {
        $this->usernameCanonical = $usernameCanonical;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmailCanonical(): ?string
    {
        return $this->emailCanonical;
    }

    public function setEmailCanonical(string $emailCanonical): self
    {
        $this->emailCanonical = $emailCanonical;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function setSalt(string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getLastLogin(): ?\DateTimeInterface
    {
        return $this->lastLogin;
    }

    public function setLastLogin(?\DateTimeInterface $lastLogin): self
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    public function getLocked(): ?bool
    {
        return $this->locked;
    }

    public function setLocked(bool $locked): self
    {
        $this->locked = $locked;

        return $this;
    }

    public function getExpired(): ?bool
    {
        return $this->expired;
    }

    public function setExpired(bool $expired): self
    {
        $this->expired = $expired;

        return $this;
    }

    public function getExpiresAt(): ?\DateTimeInterface
    {
        return $this->expiresAt;
    }

    public function setExpiresAt(?\DateTimeInterface $expiresAt): self
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    public function getConfirmationToken(): ?string
    {
        return $this->confirmationToken;
    }

    public function setConfirmationToken(?string $confirmationToken): self
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }

    public function getPasswordRequestedAt(): ?\DateTimeInterface
    {
        return $this->passwordRequestedAt;
    }

    public function setPasswordRequestedAt(?\DateTimeInterface $passwordRequestedAt): self
    {
        $this->passwordRequestedAt = $passwordRequestedAt;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getCredentialsExpired(): ?bool
    {
        return $this->credentialsExpired;
    }

    public function setCredentialsExpired(bool $credentialsExpired): self
    {
        $this->credentialsExpired = $credentialsExpired;

        return $this;
    }

    public function getCredentialsExpireAt(): ?\DateTimeInterface
    {
        return $this->credentialsExpireAt;
    }

    public function setCredentialsExpireAt(?\DateTimeInterface $credentialsExpireAt): self
    {
        $this->credentialsExpireAt = $credentialsExpireAt;

        return $this;
    }

    public function getPersonType(): ?int
    {
        return $this->personType;
    }

    public function setPersonType(int $personType): self
    {
        $this->personType = $personType;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getPhonePrefix(): ?string
    {
        return $this->phonePrefix;
    }

    public function setPhonePrefix(?string $phonePrefix): self
    {
        $this->phonePrefix = $phonePrefix;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(?string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getCountryOfResidence(): ?string
    {
        return $this->countryOfResidence;
    }

    public function setCountryOfResidence(?string $countryOfResidence): self
    {
        $this->countryOfResidence = $countryOfResidence;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(?string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function getBic(): ?string
    {
        return $this->bic;
    }

    public function setBic(?string $bic): self
    {
        $this->bic = $bic;

        return $this;
    }

    public function getBankOwnerName(): ?string
    {
        return $this->bankOwnerName;
    }

    public function setBankOwnerName(?string $bankOwnerName): self
    {
        $this->bankOwnerName = $bankOwnerName;

        return $this;
    }

    public function getBankOwnerAddress(): ?string
    {
        return $this->bankOwnerAddress;
    }

    public function setBankOwnerAddress(?string $bankOwnerAddress): self
    {
        $this->bankOwnerAddress = $bankOwnerAddress;

        return $this;
    }

    public function getAnnualIncome(): ?string
    {
        return $this->annualIncome;
    }

    public function setAnnualIncome(?string $annualIncome): self
    {
        $this->annualIncome = $annualIncome;

        return $this;
    }

    public function getPhoneVerified(): ?bool
    {
        return $this->phoneVerified;
    }

    public function setPhoneVerified(?bool $phoneVerified): self
    {
        $this->phoneVerified = $phoneVerified;

        return $this;
    }

    public function getEmailVerified(): ?bool
    {
        return $this->emailVerified;
    }

    public function setEmailVerified(?bool $emailVerified): self
    {
        $this->emailVerified = $emailVerified;

        return $this;
    }

    public function getIdCardVerified(): ?bool
    {
        return $this->idCardVerified;
    }

    public function setIdCardVerified(?bool $idCardVerified): self
    {
        $this->idCardVerified = $idCardVerified;

        return $this;
    }

    public function getNbBookingsOfferer(): ?int
    {
        return $this->nbBookingsOfferer;
    }

    public function setNbBookingsOfferer(?int $nbBookingsOfferer): self
    {
        $this->nbBookingsOfferer = $nbBookingsOfferer;

        return $this;
    }

    public function getNbBookingsAsker(): ?int
    {
        return $this->nbBookingsAsker;
    }

    public function setNbBookingsAsker(?int $nbBookingsAsker): self
    {
        $this->nbBookingsAsker = $nbBookingsAsker;

        return $this;
    }

    public function getFeeAsAsker(): ?int
    {
        return $this->feeAsAsker;
    }

    public function setFeeAsAsker(?int $feeAsAsker): self
    {
        $this->feeAsAsker = $feeAsAsker;

        return $this;
    }

    public function getFeeAsOfferer(): ?int
    {
        return $this->feeAsOfferer;
    }

    public function setFeeAsOfferer(?int $feeAsOfferer): self
    {
        $this->feeAsOfferer = $feeAsOfferer;

        return $this;
    }

    public function getAverageRatingAsAsker(): ?int
    {
        return $this->averageRatingAsAsker;
    }

    public function setAverageRatingAsAsker(?int $averageRatingAsAsker): self
    {
        $this->averageRatingAsAsker = $averageRatingAsAsker;

        return $this;
    }

    public function getAverageRatingAsOfferer(): ?int
    {
        return $this->averageRatingAsOfferer;
    }

    public function setAverageRatingAsOfferer(?int $averageRatingAsOfferer): self
    {
        $this->averageRatingAsOfferer = $averageRatingAsOfferer;

        return $this;
    }

    public function getMotherTongue(): ?string
    {
        return $this->motherTongue;
    }

    public function setMotherTongue(?string $motherTongue): self
    {
        $this->motherTongue = $motherTongue;

        return $this;
    }

    public function getAnswerDelay(): ?int
    {
        return $this->answerDelay;
    }

    public function setAnswerDelay(?int $answerDelay): self
    {
        $this->answerDelay = $answerDelay;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCreatedat(): ?\DateTimeInterface
    {
        return $this->createdat;
    }

    public function setCreatedat(?\DateTimeInterface $createdat): self
    {
        $this->createdat = $createdat;

        return $this;
    }

    public function getUpdatedat(): ?\DateTimeInterface
    {
        return $this->updatedat;
    }

    public function setUpdatedat(?\DateTimeInterface $updatedat): self
    {
        $this->updatedat = $updatedat;

        return $this;
    }

    /**
     * @return Collection|Group[]
     */
    public function getGroup(): Collection
    {
        return $this->group;
    }

    public function addGroup(Group $group): self
    {
        if (!$this->group->contains($group)) {
            $this->group[] = $group;
        }

        return $this;
    }

    public function removeGroup(Group $group): self
    {
        $this->group->removeElement($group);

        return $this;
    }

    /**
     * @return Collection|UserAddress[]
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(UserAddress $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses[] = $address;
            $address->setUser($this);
        }

        return $this;
    }

    public function removeAddress(UserAddress $address): self
    {
        if ($this->addresses->removeElement($address)) {
            // set the owning side to null (unless already changed)
            if ($address->getUser() === $this) {
                $address->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UserImage[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(UserImage $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setUser($this);
        }

        return $this;
    }

    public function removeImage(UserImage $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getUser() === $this) {
                $image->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Listing[]
     */
    public function getListing(): Collection
    {
        return $this->Listing;
    }

    public function addListing(Listing $listing): self
    {
        if (!$this->Listing->contains($listing)) {
            $this->Listing[] = $listing;
            $listing->setUser($this);
        }

        return $this;
    }

    public function removeListing(Listing $listing): self
    {
        if ($this->Listing->removeElement($listing)) {
            // set the owning side to null (unless already changed)
            if ($listing->getUser() === $this) {
                $listing->setUser(null);
            }
        }

        return $this;
    }

}
