<?php

namespace App\Entity;

use App\Repository\AnimeInfoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeInfoRepository::class)
 */
class AnimeInfo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Anime::class, mappedBy="animeinfo", cascade={"persist", "remove"})
     */
    private $anime;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnime(): ?Anime
    {
        return $this->anime;
    }

    public function setAnime(?Anime $anime): self
    {
        $this->anime = $anime;

        // set (or unset) the owning side of the relation if necessary
        $newAnimeinfo = null === $anime ? null : $this;
        if ($anime->getAnimeinfo() !== $newAnimeinfo) {
            $anime->setAnimeinfo($newAnimeinfo);
        }

        return $this;
    }
}
