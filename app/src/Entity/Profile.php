<?php

namespace App\Entity;

use App\Repository\ProfileRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfileRepository::class)
 */
class Profile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descroiption;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescroiption(): ?string
    {
        return $this->descroiption;
    }

    public function setDescroiption(?string $descroiption): self
    {
        $this->descroiption = $descroiption;

        return $this;
    }
}
