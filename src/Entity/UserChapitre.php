<?php

namespace App\Entity;

use App\Repository\UserChapitreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserChapitreRepository::class)]
class UserChapitre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $user_chapitre_date_inscription = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $user_chapitre_ended = null;

    #[ORM\ManyToOne(inversedBy: 'userChapitres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserChapitreDateInscription(): ?\DateTimeInterface
    {
        return $this->user_chapitre_date_inscription;
    }

    public function setUserChapitreDateInscription(\DateTimeInterface $user_chapitre_date_inscription): self
    {
        $this->user_chapitre_date_inscription = $user_chapitre_date_inscription;

        return $this;
    }

    public function getUserChapitreEnded(): ?int
    {
        return $this->user_chapitre_ended;
    }

    public function setUserChapitreEnded(int $user_chapitre_ended): self
    {
        $this->user_chapitre_ended = $user_chapitre_ended;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
