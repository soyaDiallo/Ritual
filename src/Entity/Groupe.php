<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
/**
 * @ORM\Entity(repositoryClass=GroupeRepository::class)
 * @ApiResource()
 */
class Groupe
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
     * @ORM\Column(type="string", length=255)
     */
    private $photoUrl;

    /**
     * @ORM\Column(type="integer")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="integer")
     */
    private $dateDesactivation;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="groupe")
     */
    private $commandes;

    /**
     * @ORM\OneToMany(targetEntity=ConsommateurGroupe::class, mappedBy="groupe")
     */
    private $consommateurGroupes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->consommateurGroupes = new ArrayCollection();
    }

    public function getId(): ?int
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

    public function getPhotoUrl(): ?string
    {
        return $this->photoUrl;
    }

    public function setPhotoUrl(string $photoUrl): self
    {
        $this->photoUrl = $photoUrl;

        return $this;
    }

    public function getDateCreation(): ?int
    {
        return $this->dateCreation;
    }

    public function setDateCreation(int $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
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

    /**
     * @return Collection|Commande[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setGroupe($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->contains($commande)) {
            $this->commandes->removeElement($commande);
            // set the owning side to null (unless already changed)
            if ($commande->getGroupe() === $this) {
                $commande->setGroupe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ConsommateurGroupe[]
     */
    public function getConsommateurGroupes(): Collection
    {
        return $this->consommateurGroupes;
    }

    public function addConsommateurGroupe(ConsommateurGroupe $consommateurGroupe): self
    {
        if (!$this->consommateurGroupes->contains($consommateurGroupe)) {
            $this->consommateurGroupes[] = $consommateurGroupe;
            $consommateurGroupe->setGroupe($this);
        }

        return $this;
    }

    public function removeConsommateurGroupe(ConsommateurGroupe $consommateurGroupe): self
    {
        if ($this->consommateurGroupes->contains($consommateurGroupe)) {
            $this->consommateurGroupes->removeElement($consommateurGroupe);
            // set the owning side to null (unless already changed)
            if ($consommateurGroupe->getGroupe() === $this) {
                $consommateurGroupe->setGroupe(null);
            }
        }

        return $this;
    }
}
