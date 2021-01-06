<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParameterAudit
 *
 * @ORM\Table(name="parameter_audit")
 * @ORM\Entity
 */
class ParameterAudit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="rev", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $rev;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=true)
     */
    private $value;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="revtype", type="string", length=4, nullable=false)
     */
    private $revtype;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getRev(): ?int
    {
        return $this->rev;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRevtype(): ?string
    {
        return $this->revtype;
    }

    public function setRevtype(string $revtype): self
    {
        $this->revtype = $revtype;

        return $this;
    }


}
