<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListingTranslation
 *
 * @ORM\Table(name="listing_translation", uniqueConstraints={@ORM\UniqueConstraint(name="listing_translation_unique_translation", columns={"translatable_id", "locale"})}, indexes={@ORM\Index(name="slug_idx", columns={"slug"}), @ORM\Index(name="IDX_E3779C3D2C2AC5D3", columns={"translatable_id"})})
 * @ORM\Entity
 */
class ListingTranslation
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
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rules", type="text", length=65535, nullable=true)
     */
    private $rules;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=255, nullable=false)
     */
    private $locale;

    /**
     * @var \Listing
     *
     * @ORM\ManyToOne(targetEntity="Listing")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="translatable_id", referencedColumnName="id")
     * })
     */
    private $translatable;


}
