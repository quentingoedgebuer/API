<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListingCharacteristicGroup
 *
 * @ORM\Table(name="listing_characteristic_group", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_62B4C3E4462CE4F5", columns={"position"})}, indexes={@ORM\Index(name="position_lcg_idx", columns={"position"})})
 * @ORM\Entity
 */
class ListingCharacteristicGroup
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
     * @var int
     *
     * @ORM\Column(name="position", type="smallint", nullable=false)
     */
    private $position;


}
