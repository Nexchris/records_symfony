<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Vinyl
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", length: 255)]
    private $artistName;

    #[ORM\Column(type: "string", length: 255)]
    private $albumTitle;

    #[ORM\Column(type: "string", length: 255)]
    private $label;

    #[ORM\Column(type: "datetime")]
    private $releaseDate;

    #[ORM\Column(type: "integer")]
    private $numberOfVinyls;

    #[ORM\Column(type: "string", length: 255)]
    private $category;

    #[ORM\Column(type: "string", length: 255)]
    private $vinylCondition;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtistName(): ?string
    {
        return $this->artistName;
    }

    public function setArtistName(string $artistName): self
    {
        $this->artistName = $artistName;

        return $this;
    }

    public function getAlbumTitle(): ?string
    {
        return $this->albumTitle;
    }

    public function setAlbumTitle(string $albumTitle): self
    {
        $this->albumTitle = $albumTitle;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getNumberOfVinyls(): ?int
    {
        return $this->numberOfVinyls;
    }

    public function setNumberOfVinyls(int $numberOfVinyls): self
    {
        $this->numberOfVinyls = $numberOfVinyls;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getVinylCondition(): ?string
    {
        return $this->vinylCondition;
    }

    public function setVinylCondition(string $vinylCondition): self
    {
        $this->vinylCondition = $vinylCondition;

        return $this;
    }
}
