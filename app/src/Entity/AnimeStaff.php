<?php

namespace App\Entity;

use App\Repository\AnimeStaffRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeStaffRepository::class)
 */
class AnimeStaff
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Anime::class, inversedBy="animeStaff")
     * @ORM\JoinColumn(nullable=false)
     */
    private $anime;

    /**
     * @ORM\OneToOne(targetEntity=CreatorType::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $creatorType;

    /**
     * @ORM\OneToOne(targetEntity=AnimeCreator::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $animeCreator;

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

    public function getCreatorType(): ?CreatorType
    {
        return $this->creatorType;
    }

    public function setCreatorType(CreatorType $creatorType): self
    {
        $this->creatorType = $creatorType;

        return $this;
    }

    public function getAnimeCreator(): ?AnimeCreator
    {
        return $this->animeCreator;
    }

    public function setAnimeCreator(AnimeCreator $animeCreator): self
    {
        $this->animeCreator = $animeCreator;

        return $this;
    }
}
