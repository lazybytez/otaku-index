<?php

namespace App\Entity;

use App\Repository\AnimeTitleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeTitleRepository::class)
 */
class AnimeTitle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Anime::class, inversedBy="animeTitle")
     * @ORM\JoinColumn(nullable=false)
     */
    private $anime;

    /**
     * @ORM\OneToOne(targetEntity=TitleType::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $titleType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

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

    public function getTitleType(): ?TitleType
    {
        return $this->titleType;
    }

    public function setTitleType(TitleType $titleType): self
    {
        $this->titleType = $titleType;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
