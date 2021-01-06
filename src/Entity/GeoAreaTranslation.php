<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GeoAreaTranslation
 *
 * @ORM\Table(name="geo_area_translation", uniqueConstraints={@ORM\UniqueConstraint(name="geo_area_translation_unique_translation", columns={"translatable_id", "locale"})}, indexes={@ORM\Index(name="name_gat_idx", columns={"name"}), @ORM\Index(name="IDX_7A5BDDAB2C2AC5D3", columns={"translatable_id"})})
 * @ORM\Entity
 */
class GeoAreaTranslation
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
     * @var \GeoArea
     *
     * @ORM\ManyToOne(targetEntity="GeoArea")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="translatable_id", referencedColumnName="id")
     * })
     */
    private $translatable;


}
