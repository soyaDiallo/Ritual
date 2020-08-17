<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleSupplementPrixRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ArticleSupplementPrixRepository::class)
 */
class ArticleSupplementPrix
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
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Prix::class, inversedBy="articleSupplementPrixes")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=ArticleSupplement::class, inversedBy="articleSupplementPrixes")
     */
    private $articleSupplement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function setDate(int $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPrix(): ?Prix
    {
        return $this->prix;
    }

    public function setPrix(?Prix $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getArticleSupplement(): ?ArticleSupplement
    {
        return $this->articleSupplement;
    }

    public function setArticleSupplement(?ArticleSupplement $articleSupplement): self
    {
        $this->articleSupplement = $articleSupplement;

        return $this;
    }
}