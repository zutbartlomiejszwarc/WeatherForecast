<?php

namespace App\Entity;

use App\Repository\MeasurementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeasurementRepository::class)]
class Measurement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: '0')]
    private ?string $temperature = null;

    #[ORM\Column(length: 255)]
    private ?string $conditions = null;

    #[ORM\Column(length: 255)]
    private ?string $precipitation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTemperature(): ?string
    {
        return $this->temperature;
    }

    public function setTemperature(string $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getConditions(): ?string
    {
        return $this->conditions;
    }

    public function setConditions(string $conditions): self
    {
        $this->conditions = $conditions;

        return $this;
    }

    public function getPrecipitation(): ?string
    {
        return $this->precipitation;
    }

    public function setPrecipitation(string $precipitation): self
    {
        $this->precipitation = $precipitation;

        return $this;
    }
    public function __toString(){

        return $this->getLocation().' '.
            $this->getDate()->format('Y-m-d').' '.
            $this->getTemperature().' '.
            $this->getConditions().' '.
            $this->getPrecipitation();

    }
}
