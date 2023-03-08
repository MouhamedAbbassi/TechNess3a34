<?php

namespace App\Entity;

use App\Repository\MedicamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Exclude;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: MedicamentRepository::class)]
class Medicament
{
  
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("medicaments")]
    private ?int $id = null;
    public function __toString(): string
    {
        return $this->id;
    }
    

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Nom est obligatoire")]
    #[Groups("medicaments")]

    private ?string $Nom = null;
    
   

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Veuiller choisir un type")]
    #[Groups("medicaments")]

    private ?string $Type = null;
    

    #[ORM\Column]
    #[Assert\NotBlank(message:"Nb dose est obligatoire")]
    #[Groups("medicaments")]

    private ?int $Nb_dose = null;

    


    #[ORM\Column]
    #[Assert\NotBlank(message:"Prix est obligatoire")]
    #[Groups("medicaments")]

    private ?int $Prix = null;
    

    #[ORM\Column]
    #[Groups("medicaments")]
    private ?int $Stock = null;
   

    
    //private $pharmacie;
    
/**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
   // private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Medicament", inversedBy="Pharmacies")
     * @ORM\JoinTable(name="medicament_pharmacie",
     *      joinColumns={@ORM\JoinColumn(name="pharmacie_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="medicament_id", referencedColumnName="id")}
     * )
     */
    //public $pharmacie;

   #[ORM\ManyToMany(targetEntity: Pharmacie::class, inversedBy: 'medicaments')]

   
    public Collection $id_pharmacie;

   #[ORM\OneToMany(mappedBy: 'medicament', targetEntity: PanierItem::class)]
   private Collection $idmed;

   #[ORM\Column(length: 255)]
   private ?string $image = null;

   

   
  


    public function __construct()
    {
        $this->id_pharmacie = new ArrayCollection();
        $this->idmed = new ArrayCollection();
   }
   
   
    public function getId(): ?int
    {
        return $this->id;
    }
    

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }
    

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getNbDose(): ?int
    {
        return $this->Nb_dose;
    }

    public function setNbDose(int $Nb_dose): self
    {
        $this->Nb_dose = $Nb_dose;

        return $this;
    }
    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(int $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->Stock;
    }

    public function setStock(int $Stock): self
    {
        $this->Stock = $Stock;

        return $this;
    }

    /**
     * @return Collection<int, Pharmacie>
     */
    public function getIdPharmacie(): Collection
    {
        return $this->id_pharmacie;
    }


   public function addIdPharmacie(Pharmacie $idPharmacie): self
    {
        if (!$this->id_pharmacie->contains($idPharmacie)) {
            $this->id_pharmacie->add($idPharmacie);
        }

        return $this;
    }

    public function removeIdPharmacie(Pharmacie $idPharmacie): self
    {
        $this->id_pharmacie->removeElement($idPharmacie);

        return $this;
    }

    /**
     * @return Collection<int, PanierItem>
     */
    public function getIdmed(): Collection
    {
        return $this->idmed;
    }

    public function addIdmed(PanierItem $idmed): self
    {
        if (!$this->idmed->contains($idmed)) {
            $this->idmed->add($idmed);
            $idmed->setMedicament($this);
        }

        return $this;
    }

    public function removeIdmed(PanierItem $idmed): self
    {
        if ($this->idmed->removeElement($idmed)) {
            // set the owning side to null (unless already changed)
            if ($idmed->getMedicament() === $this) {
                $idmed->setMedicament(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

   

    
   

    
    
    
    
}
