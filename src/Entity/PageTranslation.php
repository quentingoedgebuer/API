<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageTranslation
 *
 * @ORM\Table(name="page_translation", uniqueConstraints={@ORM\UniqueConstraint(name="page_translation_unique_translation", columns={"translatable_id", "locale"})}, indexes={@ORM\Index(name="slug_pt_idx", columns={"slug"}), @ORM\Index(name="IDX_A3D51B1D2C2AC5D3", columns={"translatable_id"})})
 * @ORM\Entity
 */
class PageTranslation
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
     * @ORM\Column(name="meta_title", type="string", length=55, nullable=false)
     */
    private $metaTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_description", type="text", length=255, nullable=false)
     */
    private $metaDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=16777215, nullable=false)
     */
    private $description;

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
     * @var \Page
     *
     * @ORM\ManyToOne(targetEntity="Page")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="translatable_id", referencedColumnName="id")
     * })
     */
    private $translatable;


}
