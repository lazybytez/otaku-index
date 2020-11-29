<?php

namespace App\Entity;

use App\Repository\AnimeTagDescriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeTagDescriptionRepository::class)
 */
class AnimeTagDescription
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=AnimeTag::class, inversedBy="tagDescription")
     * @ORM\JoinColumn(nullable=false)
     */
    private $animeTag;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimeTag(): ?AnimeTag
    {
        return $this->animeTag;
    }

    public function setAnimeTag(?AnimeTag $animeTag): self
    {
        $this->animeTag = $animeTag;

        return $this;
    }
}
