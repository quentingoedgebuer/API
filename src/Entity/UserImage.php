<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * UserImage
 *
 * @ApiResource
 * @ApiFilter(SearchFilter::class, properties={*})
 * @ORM\Table(name="user_image", indexes={@ORM\Index(name="IDX_27FFFF07A76ED395", columns={"user_id"}), @ORM\Index(name="position_u_idx", columns={"position"})})
 * @ORM\Entity
 */
class UserImage
{
    /**
     * @var int
     *
     * @Groups("lesListing")
     * @Groups("mariage")
     * @Groups("utilisateur")
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Groups("lesListing")
     * @Groups("mariage")
     * @Groups("utilisateur")
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @Groups("lesListing")
     * @Groups("mariage")
     * @ORM\Column(name="position", type="smallint", nullable=true)
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="images")
     */
    private $user;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

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
