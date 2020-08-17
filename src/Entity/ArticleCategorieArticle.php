<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleCategorieArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ArticleCategorieArticleRepository::class)
 */
class ArticleCategorieArticle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $dateDesactivation;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="articleCategorieArticles")
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieArticle::class, inversedBy="articleCategorieArticles")
     */
    private $categorieArticle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDesactivation(): ?int
    {
        return $this->dateDesactivation;
    }

    public function setDateDesactivation(int $dateDesactivation): self
    {
        $this->dateDesactivation = $dateDesactivation;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getCategorieArticle(): ?CategorieArticle
    {
        return $this->categorieArticle;
    }

    public function setCategorieArticle(?CategorieArticle $categorieArticle): self
    {
        $this->categorieArticle = $categorieArticle;

        return $this;
    }
}
