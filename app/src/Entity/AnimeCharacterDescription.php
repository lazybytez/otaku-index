<?php

namespace App\Entity;

use App\Repository\AnimeCharacterDescriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeCharacterDescriptionRepository::class)
 */
class AnimeCharacterDescription
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
