<?php

namespace App\Entity;

use App\Repository\ConsommateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Annotation\ApiResource;
/**
 * @ORM\Entity(repositoryClass=ConsommateurRepository::class)
 * @ApiResource()
 */
class Consommateur implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoUrl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="integer")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="integer")
     */
    private $dateDesactivation;

    /**
     * @ORM\OneToMany(targetEntity=PositionFavorite::class, mappedBy="consommateur")
     */
    private $positionFavorites;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="consommateur")
     */
    private $commandes;

    /**
     * @ORM\OneToMany(targetEntity=ConsommateurGroupe::class, mappedBy="consommateur")
     */
    private $consommateurGroupes;

    public function __construct()
    {
        $this->positionFavorites = new ArrayCollection();
        $this->commandes = new ArrayCollection();
        $this->consommateurGroupes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

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
     * @return Collection|PositionFavorite[]
     */
    public function getPositionFavorites(): Collection
    {
        return $this->positionFavorites;
    }

    public function addPositionFavorite(PositionFavorite $positionFavorite): self
    {
        if (!$this->positionFavorites->contains($positionFavorite)) {
            $this->positionFavorites[] = $positionFavorite;
            $positionFavorite->setConsommateur($this);
        }

        return $this;
    }

    public function removePositionFavorite(PositionFavorite $positionFavorite): self
    {
        if ($this->positionFavorites->contains($positionFavorite)) {
            $this->positionFavorites->removeElement($positionFavorite);
            // set the owning side to null (unless already changed)
            if ($positionFavorite->getConsommateur() === $this) {
                $positionFavorite->setConsommateur(null);
            }
        }

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
            $commande->setConsommateur($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->contains($commande)) {
            $this->commandes->removeElement($commande);
            // set the owning side to null (unless already changed)
            if ($commande->getConsommateur() === $this) {
                $commande->setConsommateur(null);
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
            $consommateurGroupe->setConsommateur($this);
        }

        return $this;
    }

    public function removeConsommateurGroupe(ConsommateurGroupe $consommateurGroupe): self
    {
        if ($this->consommateurGroupes->contains($consommateurGroupe)) {
            $this->consommateurGroupes->removeElement($consommateurGroupe);
            // set the owning side to null (unless already changed)
            if ($consommateurGroupe->getConsommateur() === $this) {
                $consommateurGroupe->setConsommateur(null);
            }
        }

        return $this;
    }
}
