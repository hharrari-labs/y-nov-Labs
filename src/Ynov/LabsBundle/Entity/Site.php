<?php

namespace Ynov\LabsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Site
 *
 * @ORM\Table(name="site")
 * @ORM\Entity
 */
class Site
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDSITE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMSITE", type="string", length=50, nullable=true)
     */
    private $nomsite;

    /**
     * @var string
     *
     * @ORM\Column(name="ADRESSESITE", type="string", length=250, nullable=true)
     */
    private $adressesite;

    /**
     * @var string
     *
     * @ORM\Column(name="TELEPHONE", type="string", length=15, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="FAX", type="string", length=15, nullable=true)
     */
    private $fax;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATECREATION", type="date", nullable=true)
     */
    private $datecreation;

    /**
     * @var \Ecole
     *
     * @ORM\ManyToOne(targetEntity="Ecole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDECOLE", referencedColumnName="IDECOLE", nullable=false)
     * })
     */
    private $idecole;
   
    /**
     * @var Labs
     *
     * @ORM\ManyToOne(targetEntity="Labs", inversedBy="sites", cascade={"persist","merge"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDLAB", referencedColumnName="IDLAB")
     * })
     */
    private $idlab;
    /**
     * @var ArrayCollection $labs
     *
     * @ORM\OneToMany(targetEntity="Ynov\LabsBundle\Entity\Labs", mappedBy="idsite", cascade={"persist", "remove", "merge"})
     */
    private $labs;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomsite
     *
     * @param string $nomsite
     * @return Site
     */
    public function setNomsite($nomsite)
    {
        $this->nomsite = $nomsite;

        return $this;
    }

    /**
     * Get nomsite
     *
     * @return string 
     */
    public function getNomsite()
    {
        return $this->nomsite;
    }

    /**
     * Set adressesite
     *
     * @param string $adressesite
     * @return Site
     */
    public function setAdressesite($adressesite)
    {
        $this->adressesite = $adressesite;

        return $this;
    }

    /**
     * Get adressesite
     *
     * @return string 
     */
    public function getAdressesite()
    {
        return $this->adressesite;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Site
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Site
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set datecreation
     *
     * @param \DateTime $datecreation
     * @return Site
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return \DateTime 
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }

    /**
     * Set idecole
     *
     * @param \Ynov\LabsBundle\Entity\Ecole $idecole
     * @return Site
     */
    public function setIdecole(\Ynov\LabsBundle\Entity\Ecole $idecole = null)
    {
        $this->idecole = $idecole;

        return $this;
    }

    /**
     * Get idecole
     *
     * @return \Ynov\LabsBundle\Entity\Ecole 
     */
    public function getIdecole()
    {
        return $this->idecole;
    }
    public function __toString() {
        return $this->getNomsite();
    }


    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->labs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set idlab
     *
     * @param \Ynov\LabsBundle\Entity\Labs $idlab
     * @return Site
     */
    public function setIdlab(\Ynov\LabsBundle\Entity\Labs $idlab = null)
    {
        $this->idlab = $idlab;

        return $this;
    }

    /**
     * Get idlab
     *
     * @return \Ynov\LabsBundle\Entity\Labs 
     */
    public function getIdlab()
    {
        return $this->idlab;
    }

    /**
     * Add labs
     *
     * @param \Ynov\LabsBundle\Entity\Labs $labs
     * @return Site
     */
    public function addLab(\Ynov\LabsBundle\Entity\Labs $labs)
    {
        $this->labs[] = $labs;

        return $this;
    }

    /**
     * Remove labs
     *
     * @param \Ynov\LabsBundle\Entity\Labs $labs
     */
    public function removeLab(\Ynov\LabsBundle\Entity\Labs $labs)
    {
        $this->labs->removeElement($labs);
    }

    /**
     * Get labs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLabs()
    {
        return $this->labs;
    }
}
