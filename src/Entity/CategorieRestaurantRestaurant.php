<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CategorieRestaurantRestaurantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CategorieRestaurantRestaurantRepository::class)
 */
class CategorieRestaurantRestaurant
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
    private $dateEntree;

    /**
     * @ORM\Column(type="integer")
     */
    private $dateSortie;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="categorieRestaurantRestaurants")
     */
    private $restaurant;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieRestaurant::class, inversedBy="categorieRestaurantRestaurants")
     */
    private $categorieRestaurant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEntree(): ?int
    {
        return $this->dateEntree;
    }

    public function setDateEntree(int $dateEntree): self
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    public function getDateSortie(): ?int
    {
        return $this->dateSortie;
    }

    public function setDateSortie(int $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    public function getCategorieRestaurant(): ?CategorieRestaurant
    {
        return $this->categorieRestaurant;
    }

    public function setCategorieRestaurant(?CategorieRestaurant $categorieRestaurant): self
    {
        $this->categorieRestaurant = $categorieRestaurant;

        return $this;
    }
}
