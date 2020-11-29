<?php

namespace App\Entity;

use App\Repository\AnimeInfoDescriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeInfoDescriptionRepository::class)
 */
class AnimeInfoDescription
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=AnimeInfo::class, inversedBy="animeInfoDescription")
     * @ORM\JoinColumn(nullable=false)
     */
    private $animeInfo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimeInfo(): ?AnimeInfo
    {
        return $this->animeInfo;
    }

    public function setAnimeInfo(?AnimeInfo $animeInfo): self
    {
        $this->animeInfo = $animeInfo;

        return $this;
    }
}
