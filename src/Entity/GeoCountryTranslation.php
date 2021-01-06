<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GeoCountryTranslation
 *
 * @ORM\Table(name="geo_country_translation", uniqueConstraints={@ORM\UniqueConstraint(name="geo_country_translation_unique_translation", columns={"translatable_id", "locale"})}, indexes={@ORM\Index(name="IDX_F705D5582C2AC5D3", columns={"translatable_id"})})
 * @ORM\Entity
 */
class GeoCountryTranslation
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
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
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
     * @var \GeoCountry
     *
     * @ORM\ManyToOne(targetEntity="GeoCountry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="translatable_id", referencedColumnName="id")
     * })
     */
    private $translatable;


}
