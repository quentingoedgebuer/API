<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LexikCurrency
 *
 * @ORM\Table(name="lexik_currency")
 * @ORM\Entity
 */
class LexikCurrency
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
     * @var string
     *
     * @ORM\Column(name="rate", type="decimal", precision=10, scale=4, nullable=false)
     */
    private $rate;


}
