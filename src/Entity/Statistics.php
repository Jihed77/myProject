<?php

namespace App\Entity;

use App\Repository\StatisticsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatisticsRepository::class)]
class Statistics
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numberOfPayements = null;

    #[ORM\Column]
    private ?int $numberOfAudits = null;

    #[ORM\Column]
    private ?int $numberOfUsers = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberOfPayements(): ?int
    {
        return $this->numberOfPayements;
    }

    public function setNumberOfPayements(int $numberOfPayements): static
    {
        $this->numberOfPayements = $numberOfPayements;

        return $this;
    }

    public function getNumberOfAudits(): ?int
    {
        return $this->numberOfAudits;
    }

    public function setNumberOfAudits(int $numberOfAudits): static
    {
        $this->numberOfAudits = $numberOfAudits;

        return $this;
    }

    public function getNumberOfUsers(): ?int
    {
        return $this->numberOfUsers;
    }

    public function setNumberOfUsers(int $numberOfUsers): static
    {
        $this->numberOfUsers = $numberOfUsers;

        return $this;
    }
}
