<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExperiencesRepository")
 */
class Experiences
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Dates", inversedBy="experiences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $date_start;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Dates", inversedBy="experiences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $date_end;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exp_title;

    /**
     * @ORM\Column(type="text")
     */
    private $exp_description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Places", inversedBy="experiences")
     * @ORM\JoinColumn(nullable=false)
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

    public function getExpTitle(): ?string
    {
        return $this->exp_title;
    }

    public function setExpTitle(string $exp_title): self
    {
        $this->exp_title = $exp_title;

        return $this;
    }

    public function getExpDescription(): ?string
    {
        return $this->exp_description;
    }

    public function setExpDescription(string $exp_description): self
    {
        $this->exp_description = $exp_description;

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
