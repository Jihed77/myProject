<?php

namespace App\Entity;

use App\Repository\AuditRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuditRepository::class)]
class Audit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateOfAudit = null;

    #[ORM\Column]
    private ?int $scoreSEO = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOfAudit(): ?\DateTimeInterface
    {
        return $this->DateOfAudit;
    }

    public function setDateOfAudit(\DateTimeInterface $DateOfAudit): static
    {
        $this->DateOfAudit = $DateOfAudit;

        return $this;
    }

    public function getScoreSEO(): ?int
    {
        return $this->scoreSEO;
    }

    public function setScoreSEO(int $scoreSEO): static
    {
        $this->scoreSEO = $scoreSEO;

        return $this;
    }
}
