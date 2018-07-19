<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImagesRepository")
 */
class Images
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\BlogArticles", mappedBy="image")
     */
    private $blogArticles;
    public function __toString()
    {
    return $this->picture;
    }

    public function __construct()
    {
        $this->blogArticles = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection|BlogArticles[]
     */
    public function getBlogArticles(): Collection
    {
        return $this->blogArticles;
    }

    public function addBlogArticle(BlogArticles $blogArticle): self
    {
        if (!$this->blogArticles->contains($blogArticle)) {
            $this->blogArticles[] = $blogArticle;
            $blogArticle->addImage($this);
        }

        return $this;
    }

    public function removeBlogArticle(BlogArticles $blogArticle): self
    {
        if ($this->blogArticles->contains($blogArticle)) {
            $this->blogArticles->removeElement($blogArticle);
            $blogArticle->removeImage($this);
        }

        return $this;
    }
}
