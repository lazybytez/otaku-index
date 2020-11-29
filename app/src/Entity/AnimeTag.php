<?php

namespace App\Entity;

use App\Repository\AnimeTagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeTagRepository::class)
 */
class AnimeTag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Anime::class, mappedBy="animeTag")
     */
    private $animes;

    /**
     * @ORM\OneToMany(targetEntity=AnimeTagDescription::class, mappedBy="animeTag", orphanRemoval=true)
     */
    private $tagDescription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=AnimeTag::class, cascade={"persist", "remove"})
     */
    private $parentTag;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picturePath;

    public function __construct()
    {
        $this->animes = new ArrayCollection();
        $this->tagDescription = new ArrayCollection();
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
            $anime->addAnimeTag($this);
        }

        return $this;
    }

    public function removeAnime(Anime $anime): self
    {
        if ($this->animes->contains($anime)) {
            $this->animes->removeElement($anime);
            $anime->removeAnimeTag($this);
        }

        return $this;
    }

    /**
     * @return Collection|AnimeTagDescription[]
     */
    public function getTagDescription(): Collection
    {
        return $this->tagDescription;
    }

    public function addTagDescription(AnimeTagDescription $tagDescription): self
    {
        if (!$this->tagDescription->contains($tagDescription)) {
            $this->tagDescription[] = $tagDescription;
            $tagDescription->setAnimeTag($this);
        }

        return $this;
    }

    public function removeTagDescription(AnimeTagDescription $tagDescription): self
    {
        if ($this->tagDescription->contains($tagDescription)) {
            $this->tagDescription->removeElement($tagDescription);
            // set the owning side to null (unless already changed)
            if ($tagDescription->getAnimeTag() === $this) {
                $tagDescription->setAnimeTag(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getParentTag(): ?self
    {
        return $this->parentTag;
    }

    public function setParentTag(?self $parentTag): self
    {
        $this->parentTag = $parentTag;

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
