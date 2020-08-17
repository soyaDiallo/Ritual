<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Annotation\ApiResource;
/**
 * @ORM\Entity(repositoryClass=RestaurantRepository::class)
 * @ApiResource()
 */
class Restaurant implements UserInterface
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
     * @ORM\Column(type="string", length=255)
     */
    private $slogan;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity=Menu::class, mappedBy="restaurant")
     */
    private $menus;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="restaurant")
     */
    private $commandes;

    /**
     * @ORM\OneToMany(targetEntity=HoraireRestaurant::class, mappedBy="restaurant")
     */
    private $horaireRestaurants;

    /**
     * @ORM\OneToMany(targetEntity=CategorieRestaurantRestaurant::class, mappedBy="restaurant")
     */
    private $categorieRestaurantRestaurants;

    public function __construct()
    {
        $this->menus = new ArrayCollection();
        $this->commandes = new ArrayCollection();
        $this->horaireRestaurants = new ArrayCollection();
        $this->categorieRestaurantRestaurants = new ArrayCollection();
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

    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    public function setSlogan(string $slogan): self
    {
        $this->slogan = $slogan;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|Menu[]
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus[] = $menu;
            $menu->setRestaurant($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->contains($menu)) {
            $this->menus->removeElement($menu);
            // set the owning side to null (unless already changed)
            if ($menu->getRestaurant() === $this) {
                $menu->setRestaurant(null);
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
            $commande->setRestaurant($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->contains($commande)) {
            $this->commandes->removeElement($commande);
            // set the owning side to null (unless already changed)
            if ($commande->getRestaurant() === $this) {
                $commande->setRestaurant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HoraireRestaurant[]
     */
    public function getHoraireRestaurants(): Collection
    {
        return $this->horaireRestaurants;
    }

    public function addHoraireRestaurant(HoraireRestaurant $horaireRestaurant): self
    {
        if (!$this->horaireRestaurants->contains($horaireRestaurant)) {
            $this->horaireRestaurants[] = $horaireRestaurant;
            $horaireRestaurant->setRestaurant($this);
        }

        return $this;
    }

    public function removeHoraireRestaurant(HoraireRestaurant $horaireRestaurant): self
    {
        if ($this->horaireRestaurants->contains($horaireRestaurant)) {
            $this->horaireRestaurants->removeElement($horaireRestaurant);
            // set the owning side to null (unless already changed)
            if ($horaireRestaurant->getRestaurant() === $this) {
                $horaireRestaurant->setRestaurant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CategorieRestaurantRestaurant[]
     */
    public function getCategorieRestaurantRestaurants(): Collection
    {
        return $this->categorieRestaurantRestaurants;
    }

    public function addCategorieRestaurantRestaurant(CategorieRestaurantRestaurant $categorieRestaurantRestaurant): self
    {
        if (!$this->categorieRestaurantRestaurants->contains($categorieRestaurantRestaurant)) {
            $this->categorieRestaurantRestaurants[] = $categorieRestaurantRestaurant;
            $categorieRestaurantRestaurant->setRestaurant($this);
        }

        return $this;
    }

    public function removeCategorieRestaurantRestaurant(CategorieRestaurantRestaurant $categorieRestaurantRestaurant): self
    {
        if ($this->categorieRestaurantRestaurants->contains($categorieRestaurantRestaurant)) {
            $this->categorieRestaurantRestaurants->removeElement($categorieRestaurantRestaurant);
            // set the owning side to null (unless already changed)
            if ($categorieRestaurantRestaurant->getRestaurant() === $this) {
                $categorieRestaurantRestaurant->setRestaurant(null);
            }
        }

        return $this;
    }
}
