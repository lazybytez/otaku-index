<?php

namespace App\Entity;

use App\Repository\AnimeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeRepository::class)
 */
class Anime
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=AnimeTitle::class, mappedBy="anime")
     */
    private $animetitle;

    /**
     * @ORM\OneToOne(targetEntity=AnimeInfo::class, inversedBy="anime", cascade={"persist", "remove"})
     */
    private $animeinfo;

    public function __construct()
    {
        $this->animetitle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|AnimeTitle[]
     */
    public function getAnimeTitle(): Collection
    {
        return $this->animetitle;
    }

    public function addAnimeTitle(AnimeTitle $animetitle): self
    {
        if (!$this->animetitle->contains($animetitle)) {
            $this->animetitle[] = $animetitle;
            $animetitle->setAnime($this);
        }

        return $this;
    }

    public function removeAnimeTitle(AnimeTitle $animetitle): self
    {
        if ($this->animetitle->contains($animetitle)) {
            $this->animetitle->removeElement($animetitle);
            // set the owning side to null (unless already changed)
            if ($animetitle->getAnime() === $this) {
                $animetitle->setAnime(null);
            }
        }

        return $this;
    }

    public function getAnimeinfo(): ?AnimeInfo
    {
        return $this->animeinfo;
    }

    public function setAnimeinfo(?AnimeInfo $animeinfo): self
    {
        $this->animeinfo = $animeinfo;

        return $this;
    }
}
