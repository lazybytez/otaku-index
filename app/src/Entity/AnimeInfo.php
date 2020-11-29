<?php

namespace App\Entity;

use App\Repository\AnimeInfoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToOne(targetEntity=MediaType::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $mediaType;

    /**
     * @ORM\OneToMany(targetEntity=AnimeInfoDescription::class, mappedBy="animeInfo", orphanRemoval=true)
     */
    private $animeInfoDescription;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $startdate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $enddate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picturePath;

    public function __construct()
    {
        $this->animeInfoDescription = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMediaType(): ?MediaType
    {
        return $this->mediaType;
    }

    public function setMediaType(MediaType $mediaType): self
    {
        $this->mediaType = $mediaType;

        return $this;
    }

    /**
     * @return Collection|AnimeInfoDescription[]
     */
    public function getAnimeInfoDescription(): Collection
    {
        return $this->animeInfoDescription;
    }

    public function addAnimeInfoDescription(AnimeInfoDescription $animeInfoDescription): self
    {
        if (!$this->animeInfoDescription->contains($animeInfoDescription)) {
            $this->animeInfoDescription[] = $animeInfoDescription;
            $animeInfoDescription->setAnimeInfo($this);
        }

        return $this;
    }

    public function removeAnimeInfoDescription(AnimeInfoDescription $animeInfoDescription): self
    {
        if ($this->animeInfoDescription->contains($animeInfoDescription)) {
            $this->animeInfoDescription->removeElement($animeInfoDescription);
            // set the owning side to null (unless already changed)
            if ($animeInfoDescription->getAnimeInfo() === $this) {
                $animeInfoDescription->setAnimeInfo(null);
            }
        }

        return $this;
    }

    public function getStartdate(): ?\DateTimeInterface
    {
        return $this->startdate;
    }

    public function setStartdate(?\DateTimeInterface $startdate): self
    {
        $this->startdate = $startdate;

        return $this;
    }

    public function getEnddate(): ?\DateTimeInterface
    {
        return $this->enddate;
    }

    public function setEnddate(?\DateTimeInterface $enddate): self
    {
        $this->enddate = $enddate;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPicturePath(): ?string
    {
        return $this->picturePath;
    }

    public function setPicturePath(?string $picturePath): self
    {
        $this->picturePath = $picturePath;

        return $this;
    }
}
