<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListingCategoryTranslation
 *
 * @ORM\Table(name="listing_category_translation", uniqueConstraints={@ORM\UniqueConstraint(name="listing_category_translation_unique_translation", columns={"translatable_id", "locale"})}, indexes={@ORM\Index(name="name_idx", columns={"name"}), @ORM\Index(name="IDX_606EDC1F2C2AC5D3", columns={"translatable_id"})})
 * @ORM\Entity
 */
class ListingCategoryTranslation
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
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

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
     * @var \ListingCategory
     *
     * @ORM\ManyToOne(targetEntity="ListingCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="translatable_id", referencedColumnName="id")
     * })
     */
    private $translatable;


}
