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
     * @ORM\OneToMany(targetEntity=AnimeTitle::class, mappedBy="anime", orphanRemoval=true)
     */
    private $animeTitle;

    /**
     * @ORM\OneToOne(targetEntity=AnimeInfo::class, cascade={"persist", "remove"})
     */
    private $animeInfo;

    /**
     * @ORM\OneToMany(targetEntity=AnimeEpisode::class, mappedBy="anime", orphanRemoval=true)
     */
    private $animeEpisode;

    /**
     * @ORM\ManyToMany(targetEntity=AnimeTag::class, inversedBy="animes")
     */
    private $animeTag;

    /**
     * @ORM\OneToMany(targetEntity=AnimeStaff::class, mappedBy="anime", orphanRemoval=true)
     */
    private $animeStaff;

    /**
     * @ORM\OneToMany(targetEntity=AnimeCast::class, mappedBy="anime", orphanRemoval=true)
     */
    private $animeCast;

    /**
     * @ORM\ManyToMany(targetEntity=AnimeRelated::class, inversedBy="animes")
     */
    private $animeRelated;

    /**
     * @ORM\OneToOne(targetEntity=AnimeIdAlternative::class, inversedBy="anime", cascade={"persist", "remove"})
     */
    private $animeIdAlternative;

    public function __construct()
    {
        $this->animeTitle = new ArrayCollection();
        $this->animeEpisode = new ArrayCollection();
        $this->animeTag = new ArrayCollection();
        $this->animeStaff = new ArrayCollection();
        $this->animeCast = new ArrayCollection();
        $this->animeRelated = new ArrayCollection();
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
        return $this->animeTitle;
    }

    public function addAnimeTitle(AnimeTitle $animeTitle): self
    {
        if (!$this->animeTitle->contains($animeTitle)) {
            $this->animeTitle[] = $animeTitle;
            $animeTitle->setAnime($this);
        }

        return $this;
    }

    public function removeAnimeTitle(AnimeTitle $animeTitle): self
    {
        if ($this->animeTitle->contains($animeTitle)) {
            $this->animeTitle->removeElement($animeTitle);
            // set the owning side to null (unless already changed)
            if ($animeTitle->getAnime() === $this) {
                $animeTitle->setAnime(null);
            }
        }

        return $this;
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

    /**
     * @return Collection|AnimeEpisode[]
     */
    public function getAnimeEpisode(): Collection
    {
        return $this->animeEpisode;
    }

    public function addAnimeEpisode(AnimeEpisode $animeEpisode): self
    {
        if (!$this->animeEpisode->contains($animeEpisode)) {
            $this->animeEpisode[] = $animeEpisode;
            $animeEpisode->setAnime($this);
        }

        return $this;
    }

    public function removeAnimeEpisode(AnimeEpisode $animeEpisode): self
    {
        if ($this->animeEpisode->contains($animeEpisode)) {
            $this->animeEpisode->removeElement($animeEpisode);
            // set the owning side to null (unless already changed)
            if ($animeEpisode->getAnime() === $this) {
                $animeEpisode->setAnime(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AnimeTag[]
     */
    public function getAnimeTag(): Collection
    {
        return $this->animeTag;
    }

    public function addAnimeTag(AnimeTag $animeTag): self
    {
        if (!$this->animeTag->contains($animeTag)) {
            $this->animeTag[] = $animeTag;
        }

        return $this;
    }

    public function removeAnimeTag(AnimeTag $animeTag): self
    {
        if ($this->animeTag->contains($animeTag)) {
            $this->animeTag->removeElement($animeTag);
        }

        return $this;
    }

    /**
     * @return Collection|AnimeStaff[]
     */
    public function getAnimeStaff(): Collection
    {
        return $this->animeStaff;
    }

    public function addAnimeStaff(AnimeStaff $animeStaff): self
    {
        if (!$this->animeStaff->contains($animeStaff)) {
            $this->animeStaff[] = $animeStaff;
            $animeStaff->setAnime($this);
        }

        return $this;
    }

    public function removeAnimeStaff(AnimeStaff $animeStaff): self
    {
        if ($this->animeStaff->contains($animeStaff)) {
            $this->animeStaff->removeElement($animeStaff);
            // set the owning side to null (unless already changed)
            if ($animeStaff->getAnime() === $this) {
                $animeStaff->setAnime(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AnimeCast[]
     */
    public function getAnimeCast(): Collection
    {
        return $this->animeCast;
    }

    public function addAnimeCast(AnimeCast $animeCast): self
    {
        if (!$this->animeCast->contains($animeCast)) {
            $this->animeCast[] = $animeCast;
            $animeCast->setAnime($this);
        }

        return $this;
    }

    public function removeAnimeCast(AnimeCast $animeCast): self
    {
        if ($this->animeCast->contains($animeCast)) {
            $this->animeCast->removeElement($animeCast);
            // set the owning side to null (unless already changed)
            if ($animeCast->getAnime() === $this) {
                $animeCast->setAnime(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AnimeRelated[]
     */
    public function getAnimeRelated(): Collection
    {
        return $this->animeRelated;
    }

    public function addAnimeRelated(AnimeRelated $animeRelated): self
    {
        if (!$this->animeRelated->contains($animeRelated)) {
            $this->animeRelated[] = $animeRelated;
        }

        return $this;
    }

    public function removeAnimeRelated(AnimeRelated $animeRelated): self
    {
        if ($this->animeRelated->contains($animeRelated)) {
            $this->animeRelated->removeElement($animeRelated);
        }

        return $this;
    }

    public function getAnimeIdAlternative(): ?AnimeIdAlternative
    {
        return $this->animeIdAlternative;
    }

    public function setAnimeIdAlternative(?AnimeIdAlternative $animeIdAlternative): self
    {
        $this->animeIdAlternative = $animeIdAlternative;

        return $this;
    }
}
