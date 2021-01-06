<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mariage
 *
 * @ORM\Table(name="mariage")
 * @ORM\Entity
 */
class Mariage
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
     * @ORM\Column(name="nom", type="string", length=40, nullable=false)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="texte", type="text", length=0, nullable=true)
     */
    private $texte;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string|null
     *
     * @ORM\Column(name="traduction", type="string", length=255, nullable=true)
     */
    private $traduction;

    /**
     * @var string|null
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imageaccueil", type="string", length=255, nullable=true)
     */
    private $imageaccueil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Listing", inversedBy="mariage")
     * @ORM\JoinTable(name="participations",
     *   joinColumns={
     *     @ORM\JoinColumn(name="mariage_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="listing_id", referencedColumnName="id")
     *   }
     * )
     */
    private $listing;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listing = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
