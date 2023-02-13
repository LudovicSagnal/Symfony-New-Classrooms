<?php

namespace App\Entity;

use App\Repository\ChapitreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChapitreRepository::class)]
class Chapitre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $chapitre_title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $chapitre_content = null;

    #[ORM\Column]
    private ?int $chapitre_position = null;

    #[ORM\ManyToOne(inversedBy: 'chapitres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cours $cours = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChapitreTitle(): ?string
    {
        return $this->chapitre_title;
    }

    public function setChapitreTitle(string $chapitre_title): self
    {
        $this->chapitre_title = $chapitre_title;

        return $this;
    }

    public function getChapitreContent(): ?string
    {
        return $this->chapitre_content;
    }

    public function setChapitreContent(string $chapitre_content): self
    {
        $this->chapitre_content = $chapitre_content;

        return $this;
    }

    public function getChapitrePosition(): ?int
    {
        return $this->chapitre_position;
    }

    public function setChapitrePosition(int $chapitre_position): self
    {
        $this->chapitre_position = $chapitre_position;

        return $this;
    }

    public function getCours(): ?Cours
    {
        return $this->cours;
    }

    public function setCours(?Cours $cours): self
    {
        $this->cours = $cours;

        return $this;
    }
}
