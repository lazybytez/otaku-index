<?php

namespace App\Entity;

use App\Repository\AnimeEpisodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeEpisodeRepository::class)
 */
class AnimeEpisode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Anime::class, inversedBy="animeEpisode")
     * @ORM\JoinColumn(nullable=false)
     */
    private $anime;

    /**
     * @ORM\OneToOne(targetEntity=EpisodeType::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $episodeType;

    /**
     * @ORM\OneToMany(targetEntity=AnimeEpisodeTitle::class, mappedBy="animeEpisode", orphanRemoval=true)
     */
    private $animeEpisodeTitle;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $length;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $number;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $airdate;

    public function __construct()
    {
        $this->animeEpisodeTitle = new ArrayCollection();
    }

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

        return $this;
    }

    public function getEpisodeType(): ?EpisodeType
    {
        return $this->episodeType;
    }

    public function setEpisodeType(EpisodeType $episodeType): self
    {
        $this->episodeType = $episodeType;

        return $this;
    }

    /**
     * @return Collection|AnimeEpisodeTitle[]
     */
    public function getAnimeEpisodeTitle(): Collection
    {
        return $this->animeEpisodeTitle;
    }

    public function addAnimeEpisodeTitle(AnimeEpisodeTitle $animeEpisodeTitle): self
    {
        if (!$this->animeEpisodeTitle->contains($animeEpisodeTitle)) {
            $this->animeEpisodeTitle[] = $animeEpisodeTitle;
            $animeEpisodeTitle->setAnimeEpisode($this);
        }

        return $this;
    }

    public function removeAnimeEpisodeTitle(AnimeEpisodeTitle $animeEpisodeTitle): self
    {
        if ($this->animeEpisodeTitle->contains($animeEpisodeTitle)) {
            $this->animeEpisodeTitle->removeElement($animeEpisodeTitle);
            // set the owning side to null (unless already changed)
            if ($animeEpisodeTitle->getAnimeEpisode() === $this) {
                $animeEpisodeTitle->setAnimeEpisode(null);
            }
        }

        return $this;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(?int $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getAirdate(): ?\DateTimeInterface
    {
        return $this->airdate;
    }

    public function setAirdate(?\DateTimeInterface $airdate): self
    {
        $this->airdate = $airdate;

        return $this;
    }
}
