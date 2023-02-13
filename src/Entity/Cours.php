<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $cours_title = null;

    #[ORM\Column(length: 100)]
    private ?string $cours_synopsis = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $cours_level = null;

    #[ORM\Column]
    private ?int $cours_duration = null;

    #[ORM\Column(length: 100)]
    private ?string $cours_image = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $cours_date = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $cours_created = null;

    #[ORM\OneToMany(mappedBy: 'cours', targetEntity: Chapitre::class, orphanRemoval: true)]
    private Collection $chapitres;

    public function __construct()
    {
        $this->chapitres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoursTitle(): ?string
    {
        return $this->cours_title;
    }

    public function setCoursTitle(string $cours_title): self
    {
        $this->cours_title = $cours_title;

        return $this;
    }

    public function getCoursSynopsis(): ?string
    {
        return $this->cours_synopsis;
    }

    public function setCoursSynopsis(string $cours_synopsis): self
    {
        $this->cours_synopsis = $cours_synopsis;

        return $this;
    }

    public function getCoursLevel(): ?int
    {
        return $this->cours_level;
    }

    public function setCoursLevel(int $cours_level): self
    {
        $this->cours_level = $cours_level;

        return $this;
    }

    public function getCoursDuration(): ?int
    {
        return $this->cours_duration;
    }

    public function setCoursDuration(int $cours_duration): self
    {
        $this->cours_duration = $cours_duration;

        return $this;
    }

    public function getCoursImage(): ?string
    {
        return $this->cours_image;
    }

    public function setCoursImage(string $cours_image): self
    {
        $this->cours_image = $cours_image;

        return $this;
    }

    public function getCoursDate(): ?\DateTimeInterface
    {
        return $this->cours_date;
    }

    public function setCoursDate(\DateTimeInterface $cours_date): self
    {
        $this->cours_date = $cours_date;

        return $this;
    }

    public function getCoursCreated(): ?int
    {
        return $this->cours_created;
    }

    public function setCoursCreated(int $cours_created): self
    {
        $this->cours_created = $cours_created;

        return $this;
    }

    /**
     * @return Collection<int, Chapitre>
     */
    public function getChapitres(): Collection
    {
        return $this->chapitres;
    }

    public function addChapitre(Chapitre $chapitre): self
    {
        if (!$this->chapitres->contains($chapitre)) {
            $this->chapitres->add($chapitre);
            $chapitre->setCours($this);
        }

        return $this;
    }

    public function removeChapitre(Chapitre $chapitre): self
    {
        if ($this->chapitres->removeElement($chapitre)) {
            // set the owning side to null (unless already changed)
            if ($chapitre->getCours() === $this) {
                $chapitre->setCours(null);
            }
        }

        return $this;
    }
}
