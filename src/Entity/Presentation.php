<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PresentationRepository")
 */
class Presentation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_address;

    /**
     * @ORM\Column(type="string")
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkedin_link;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $github_link;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Places", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $place;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CV;


    public function getId()
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEmailAddress(): ?string
    {
        return $this->email_address;
    }

    public function setEmailAddress(string $email_address): self
    {
        $this->email_address = $email_address;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(int $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getLinkedinLink(): ?string
    {
        return $this->linkedin_link;
    }

    public function setLinkedinLink(string $linkedin_link): self
    {
        $this->linkedin_link = $linkedin_link;

        return $this;
    }

    public function getGithubLink(): ?string
    {
        return $this->github_link;
    }

    public function setGithubLink(string $github_link): self
    {
        $this->github_link = $github_link;

        return $this;
    }

    public function getPlaces(): ?Places
    {
        return $this->places;
    }

    public function setPlaces(Places $places): self
    {
        $this->places = $places;

        // set the owning side of the relation if necessary
        if ($this !== $places->getIdCity()) {
            $places->setIdCity($this);
        }

        return $this;
    }

    public function getPlace(): ?Places
    {
        return $this->place;
    }

    public function setPlace(Places $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getCV(): ?string
    {
        return $this->CV;
    }

    public function setCV(?string $CV): self
    {
        $this->CV = $CV;

        return $this;
    }
}
