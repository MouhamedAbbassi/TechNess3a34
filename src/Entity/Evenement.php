<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message:"Veuillez entrer le nom d'evenement !")]
    private ?string $nom = null;

    #[ORM\Column]
    #[assert\NotBlank(message:"Veuillez entrer une capacite valide !")]
    private ?int $capacite = null;

    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message:"Veuillez entrer le nom de local  !")]
    private ?string $local = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message:"Veuillez entrer le prix  !")]
    private ?string $prix = null;

    #[ORM\ManyToOne(inversedBy: 'event')]
    private ?Categorie $type = null;

    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message:"Veuillez entrer un description a propos cet évenement  !")]
    private ?string $Description = null;

    

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Participation::class)]
    private Collection $participations;

    #[ORM\OneToMany(mappedBy: 'evenement', targetEntity: Like::class)]
    private Collection $likes;

  
    public function __construct()
    {
        $this->participations = new ArrayCollection();
        $this->likes = new ArrayCollection(); 
    }

    Public function __tostring() :string{

        return $this->nom;
        
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

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getLocal(): ?string
    {
        return $this->local;
    }

    public function setLocal(string $local): self
    {
        $this->local = $local;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getType(): ?Categorie
    {
        return $this->type;
    }

    public function setType(?Categorie $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

  

    /**
     * @return Collection<int, Participation>
     */
    public function getParticipations(): Collection
    {
        return $this->participations;
    }

    public function addParticipation(Participation $participation): self
    {
        if (!$this->participations->contains($participation)) {
            $this->participations->add($participation);
            $participation->setEvent($this);
        }

        return $this;
    }

    public function removeParticipation(Participation $participation): self
    {
        if ($this->participations->removeElement($participation)) {
            // set the owning side to null (unless already changed)
            if ($participation->getEvent() === $this) {
                $participation->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Like>
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(Like $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes->add($like);
            $like->setEvenement($this);
        }

        return $this;
    }

    public function removeLike(Like $like): self
    {
        if ($this->likes->removeElement($like)) {
            // set the owning side to null (unless already changed)
            if ($like->getEvenement() === $this) {
                $like->setEvenement(null);
            }
        }

        return $this;
    }
 
    






}
