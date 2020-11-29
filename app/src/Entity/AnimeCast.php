<?php

namespace App\Entity;

use App\Repository\AnimeCastRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeCastRepository::class)
 */
class AnimeCast
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Anime::class, inversedBy="animeCast")
     * @ORM\JoinColumn(nullable=false)
     */
    private $anime;

    /**
     * @ORM\OneToOne(targetEntity=CharacterType::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $characterType;

    /**
     * @ORM\OneToOne(targetEntity=AnimeCharacter::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $animeCharacter;

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

    public function getCharacterType(): ?CharacterType
    {
        return $this->characterType;
    }

    public function setCharacterType(CharacterType $characterType): self
    {
        $this->characterType = $characterType;

        return $this;
    }

    public function getAnimeCharacter(): ?AnimeCharacter
    {
        return $this->animeCharacter;
    }

    public function setAnimeCharacter(AnimeCharacter $animeCharacter): self
    {
        $this->animeCharacter = $animeCharacter;

        return $this;
    }
}
