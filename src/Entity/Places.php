<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlacesRepository")
 */
class Places
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
    private $place_name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cities", inversedBy="places")
     * @ORM\JoinColumn(nullable=false)
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Experiences", mappedBy="place")
     */
    private $experiences;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\School", mappedBy="place")
     */
    private $schools;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Projects", mappedBy="place")
     */
    private $projects;

    public function __construct()
    {
        $this->experiences = new ArrayCollection();
        $this->schools = new ArrayCollection();
        $this->projects = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPlaceName(): ?string
    {
        return $this->place_name;
    }

    public function setPlaceName(string $place_name): self
    {
        $this->place_name = $place_name;

        return $this;
    }

    public function getCity(): ?Cities
    {
        return $this->city;
    }

    public function setCity(?Cities $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|Experiences[]
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experiences $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setPlace($this);
        }

        return $this;
    }

    public function removeExperience(Experiences $experience): self
    {
        if ($this->experiences->contains($experience)) {
            $this->experiences->removeElement($experience);
            // set the owning side to null (unless already changed)
            if ($experience->getPlace() === $this) {
                $experience->setPlace(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|School[]
     */
    public function getSchools(): Collection
    {
        return $this->schools;
    }

    public function addSchool(School $school): self
    {
        if (!$this->schools->contains($school)) {
            $this->schools[] = $school;
            $school->setPlace($this);
        }

        return $this;
    }

    public function removeSchool(School $school): self
    {
        if ($this->schools->contains($school)) {
            $this->schools->removeElement($school);
            // set the owning side to null (unless already changed)
            if ($school->getPlace() === $this) {
                $school->setPlace(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Projects[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Projects $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setPlace($this);
        }

        return $this;
    }

    public function removeProject(Projects $project): self
    {
        if ($this->projects->contains($project)) {
            $this->projects->removeElement($project);
            // set the owning side to null (unless already changed)
            if ($project->getPlace() === $this) {
                $project->setPlace(null);
            }
        }

        return $this;
    }
}
