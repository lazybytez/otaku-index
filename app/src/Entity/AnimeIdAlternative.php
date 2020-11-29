<?php

namespace App\Entity;

use App\Repository\AnimeIdAlternativeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeIdAlternativeRepository::class)
 */
class AnimeIdAlternative
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Anime::class, mappedBy="animeIdAlternative", cascade={"persist", "remove"})
     */
    private $anime;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $anidb_anime_id;

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
        $newAnimeIdAlternative = null === $anime ? null : $this;
        if ($anime->getAnimeIdAlternative() !== $newAnimeIdAlternative) {
            $anime->setAnimeIdAlternative($newAnimeIdAlternative);
        }

        return $this;
    }

    public function getAnidbAnimeId(): ?int
    {
        return $this->anidb_anime_id;
    }

    public function setAnidbAnimeId(?int $anidb_anime_id): self
    {
        $this->anidb_anime_id = $anidb_anime_id;

        return $this;
    }
}
