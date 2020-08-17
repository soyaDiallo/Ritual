<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ConsommateurGroupeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ConsommateurGroupeRepository::class)
 */
class ConsommateurGroupe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $role;

    /**
     * @ORM\Column(type="integer")
     */
    private $dateEntree;

    /**
     * @ORM\Column(type="integer")
     */
    private $dateSortie;

    /**
     * @ORM\ManyToOne(targetEntity=Consommateur::class, inversedBy="consommateurGroupes")
     */
    private $consommateur;

    /**
     * @ORM\ManyToOne(targetEntity=Groupe::class, inversedBy="consommateurGroupes")
     */
    private $groupe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
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

    public function getConsommateur(): ?Consommateur
    {
        return $this->consommateur;
    }

    public function setConsommateur(?Consommateur $consommateur): self
    {
        $this->consommateur = $consommateur;

        return $this;
    }

    public function getGroupe(): ?Groupe
    {
        return $this->groupe;
    }

    public function setGroupe(?Groupe $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }
}
