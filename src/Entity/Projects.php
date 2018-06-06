<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectsRepository")
 */
class Projects
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
    private $project_name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $project_description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Dates", inversedBy="projects")
     */
    private $project_year;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link_to_project;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Places", inversedBy="projects")
     */
    private $place;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Skills", inversedBy="projects")
     */
    private $skill;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Images", cascade={"persist", "remove"})
     */
    private $main_img;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Images", cascade={"persist", "remove"})
     */
    private $sec_img;

    public function __construct()
    {
        $this->skill = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getProjectName(): ?string
    {
        return $this->project_name;
    }

    public function setProjectName(string $project_name): self
    {
        $this->project_name = $project_name;

        return $this;
    }

    public function getProjectDescription(): ?string
    {
        return $this->project_description;
    }

    public function setProjectDescription(?string $project_description): self
    {
        $this->project_description = $project_description;

        return $this;
    }

    public function getProjectYear(): ?Dates
    {
        return $this->project_year;
    }

    public function setProjectYear(?Dates $project_year): self
    {
        $this->project_year = $project_year;

        return $this;
    }

    public function getLinkToProject(): ?string
    {
        return $this->link_to_project;
    }

    public function setLinkToProject(?string $link_to_project): self
    {
        $this->link_to_project = $link_to_project;

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

    /**
     * @return Collection|Skills[]
     */
    public function getSkill(): Collection
    {
        return $this->skill;
    }

    public function addSkill(Skills $skill): self
    {
        if (!$this->skill->contains($skill)) {
            $this->skill[] = $skill;
        }

        return $this;
    }

    public function removeSkill(Skills $skill): self
    {
        if ($this->skill->contains($skill)) {
            $this->skill->removeElement($skill);
        }

        return $this;
    }

    public function getMainImg(): ?Images
    {
        return $this->main_img;
    }

    public function setMainImg(?Images $main_img): self
    {
        $this->main_img = $main_img;

        return $this;
    }

    public function getSecImg(): ?Images
    {
        return $this->sec_img;
    }

    public function setSecImg(?Images $sec_img): self
    {
        $this->sec_img = $sec_img;

        return $this;
    }
}
