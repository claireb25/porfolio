<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchoolRepository")
 */
class School
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Dates", inversedBy="schools")
     */
    private $date_start;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Dates", inversedBy="schools")
     */
    private $date_end;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $diploma_name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Places", inversedBy="schools")
     */
    private $place;

    public function getId()
    {
        return $this->id;
    }

    public function getDateStart(): ?Dates
    {
        return $this->date_start;
    }

    public function setDateStart(?Dates $date_start): self
    {
        $this->date_start = $date_start;

        return $this;
    }

    public function getDateEnd(): ?Dates
    {
        return $this->date_end;
    }

    public function setDateEnd(?Dates $date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }

    public function getDiplomaName(): ?string
    {
        return $this->diploma_name;
    }

    public function setDiplomaName(?string $diploma_name): self
    {
        $this->diploma_name = $diploma_name;

        return $this;
    }

    public function getPlace(): ?Places
    {
        return $this->place;
    }

    public function setPlace(?Places $place): self
    {
        $this->place = $place;

        return $this;
    }
}
