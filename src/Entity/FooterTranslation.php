<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FooterTranslation
 *
 * @ORM\Table(name="footer_translation", uniqueConstraints={@ORM\UniqueConstraint(name="footer_translation_unique_translation", columns={"translatable_id", "locale"})}, indexes={@ORM\Index(name="footer_url_hash_idx", columns={"url_hash"}), @ORM\Index(name="IDX_439793442C2AC5D3", columns={"translatable_id"})})
 * @ORM\Entity
 */
class FooterTranslation
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
     * @ORM\Column(name="url", type="string", length=2000, nullable=true)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_hash", type="string", length=255, nullable=true)
     */
    private $urlHash;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=2000, nullable=false)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=255, nullable=false)
     */
    private $locale;

    /**
     * @var \Footer
     *
     * @ORM\ManyToOne(targetEntity="Footer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="translatable_id", referencedColumnName="id")
     * })
     */
    private $translatable;


}
