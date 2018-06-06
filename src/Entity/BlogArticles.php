<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlogArticlesRepository")
 */
class BlogArticles
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
    private $article_title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $article;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $publication_date;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Images", inversedBy="blogArticles")
     */
    private $image;

    public function __construct()
    {
        $this->image = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getArticleTitle(): ?string
    {
        return $this->article_title;
    }

    public function setArticleTitle(?string $article_title): self
    {
        $this->article_title = $article_title;

        return $this;
    }

    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle(?string $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getPublicationDate(): ?string
    {
        return $this->publication_date;
    }

    public function setPublicationDate(?string $publication_date): self
    {
        $this->publication_date = $publication_date;

        return $this;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImage(): Collection
    {
        return $this->image;
    }

    public function addImage(Images $image): self
    {
        if (!$this->image->contains($image)) {
            $this->image[] = $image;
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->image->contains($image)) {
            $this->image->removeElement($image);
        }

        return $this;
    }
}
