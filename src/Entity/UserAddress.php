<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserAddress
 *
 * @ApiResource
 * @ORM\Table(name="user_address", indexes={@ORM\Index(name="IDX_5543718BA76ED395", columns={"user_id"}), @ORM\Index(name="user_address_type_idx", columns={"type"})})
 * @ORM\Entity
 */
class UserAddress
{
    /**
     * @var int
     *
     * @Groups("listing")
     * @Groups("mariage")
     * @Groups("utilisateur")
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @Groups("listing")
     * @Groups("mariage")
     * @ORM\Column(name="type", type="smallint", nullable=true, options={"default"="1"})
     */
    private $type = '1';

    /**
     * @var string|null
     *
     * @Groups("listing")
     * @Groups("mariage")
     * @Groups("utilisateur")
     * @Groups("listingCategory")
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     * 
     */
    private $address;

    /**
     * @var string|null
     *
     * @Groups("listing")
     * @Groups("mariage")
     * @Groups("utilisateur")
     * @Groups("listingCategory")
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     * 
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="zip", type="string", length=50, nullable=true) 
     */
    private $zip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country", type="string", length=3, nullable=true)
     */
    private $country;

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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="addresses")
     */
    private $user;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
