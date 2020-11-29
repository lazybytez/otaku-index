<?php

namespace App\Entity;

use App\Repository\AnimeEpisodeTitleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeEpisodeTitleRepository::class)
 */
class AnimeEpisodeTitle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=AnimeEpisode::class, inversedBy="animeEpisodeTitle")
     * @ORM\JoinColumn(nullable=false)
     */
    private $animeEpisode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimeEpisode(): ?AnimeEpisode
    {
        return $this->animeEpisode;
    }

    public function setAnimeEpisode(?AnimeEpisode $animeEpisode): self
    {
        $this->animeEpisode = $animeEpisode;

        return $this;
    }
}
