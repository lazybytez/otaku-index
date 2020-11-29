<?php

namespace App\Entity;

use App\Repository\AnimeRelatedRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeRelatedRepository::class)
 */
class AnimeRelated
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Anime::class, mappedBy="animeRelated")
     */
    private $animes;

    public function __construct()
    {
        $this->animes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Anime[]
     */
    public function getAnimes(): Collection
    {
        return $this->animes;
    }

    public function addAnime(Anime $anime): self
    {
        if (!$this->animes->contains($anime)) {
            $this->animes[] = $anime;
            $anime->addAnimeRelated($this);
        }

        return $this;
    }

    public function removeAnime(Anime $anime): self
    {
        if ($this->animes->contains($anime)) {
            $this->animes->removeElement($anime);
            $anime->removeAnimeRelated($this);
        }

        return $this;
    }
}
