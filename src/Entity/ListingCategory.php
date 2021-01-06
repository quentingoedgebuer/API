<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListingCategory
 *
 * @ORM\Table(name="listing_category", indexes={@ORM\Index(name="IDX_E0307BBB727ACA70", columns={"parent_id"})})
 * @ORM\Entity
 */
class ListingCategory
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
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="texte", type="text", length=0, nullable=true)
     */
    private $texte;

    /**
     * @var string|null
     *
     * @ORM\Column(name="texteaccueil", type="text", length=0, nullable=true)
     */
    private $texteaccueil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imageaccueil", type="string", length=255, nullable=true)
     */
    private $imageaccueil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=255, nullable=true)
     */
    private $description;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="accueil", type="boolean", nullable=true)
     */
    private $accueil;

    /**
     * @var int
     *
     * @ORM\Column(name="lft", type="integer", nullable=false)
     */
    private $lft;

    /**
     * @var int
     *
     * @ORM\Column(name="lvl", type="integer", nullable=false)
     */
    private $lvl;

    /**
     * @var int
     *
     * @ORM\Column(name="rgt", type="integer", nullable=false)
     */
    private $rgt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="root", type="integer", nullable=true)
     */
    private $root;

    /**
     * @var \ListingCategory
     *
     * @ORM\ManyToOne(targetEntity="ListingCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;


}
