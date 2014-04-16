<?php

namespace Ynov\LabsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Labs
 *
 * @ORM\Table(name="labs")
 * @ORM\Entity
 * @UniqueEntity(fields="nomlab", message="Ce laboratoire existe déjà")
 */
class Labs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDLAB", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMLAB", type="string", length=50, nullable=true)
     */
    private $nomlab;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATECREATION", type="date", nullable=true)
     */
    private $datecreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEMAJLAB", type="date", nullable=true)
     */
    private $datemajlab;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPTIONLAB", type="text", nullable=true)
     */
    private $descriptionlab;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDUTILISATEUR", referencedColumnName="IDUTILISATEUR")
     * })
     */
    private $idutilisateur;
    
    /**
     * @var ArrayCollection $sites
     *
     * @ORM\OneToMany(targetEntity="Ynov\LabsBundle\Entity\Site", mappedBy="idlab", cascade={"persist", "remove", "merge"})
     */
    private $sites;
    /**
     * @var Site
     *
     * @ORM\ManyToOne(targetEntity="Site", inversedBy="labs", cascade={"persist","merge"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDSITE", referencedColumnName="IDSITE")
     * })
     */
    private $idsite;
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
     * Set nomlab
     *
     * @param string $nomlab
     * @return Labs
     */
    public function setNomlab($nomlab)
    {
        $this->nomlab = $nomlab;

        return $this;
    }

    /**
     * Get nomlab
     *
     * @return string 
     */
    public function getNomlab()
    {
        return $this->nomlab;
    }

    /**
     * Set datecreation
     *
     * @param \DateTime $datecreation
     * @return Labs
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
     * Set codecouleur
     *
     * @param string $codecouleur
     * @return Labs
     */
    public function setCodecouleur($codecouleur)
    {
        $this->codecouleur = $codecouleur;

        return $this;
    }

    /**
     * Get codecouleur
     *
     * @return string 
     */
    public function getCodecouleur()
    {
        return $this->codecouleur;
    }

    /**
     * Set datemajlab
     *
     * @param \DateTime $datemajlab
     * @return Labs
     */
    public function setDatemajlab($datemajlab)
    {
        $this->datemajlab = $datemajlab;

        return $this;
    }

    /**
     * Get datemajlab
     *
     * @return \DateTime 
     */
    public function getDatemajlab()
    {
        return $this->datemajlab;
    }

    /**
     * Set descriptionlab
     *
     * @param string $descriptionlab
     * @return Labs
     */
    public function setDescriptionlab($descriptionlab)
    {
        $this->descriptionlab = $descriptionlab;

        return $this;
    }

    /**
     * Get descriptionlab
     *
     * @return string 
     */
    public function getDescriptionlab()
    {
        return $this->descriptionlab;
    }

    /**
     * Set idutilisateur
     *
     * @param \Ynov\LabsBundle\Entity\Utilisateur $idutilisateur
     * @return Labs
     */
    public function setIdutilisateur(\Ynov\LabsBundle\Entity\Utilisateur $idutilisateur = null)
    {
        $this->idutilisateur = $idutilisateur;

        return $this;
    }

    /**
     * Get idutilisateur
     *
     * @return \Ynov\LabsBundle\Entity\Utilisateur 
     */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }

    public function __toString() {
        return $this->getNomlab();
    }
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sites = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add sites
     *
     * @param \Ynov\LabsBundle\Entity\Site $sites
     * @return Labs
     */
    public function addSite(\Ynov\LabsBundle\Entity\Site $sites)
    {
        $this->sites[] = $sites;

        return $this;
    }

    /**
     * Remove sites
     *
     * @param \Ynov\LabsBundle\Entity\Site $sites
     */
    public function removeSite(\Ynov\LabsBundle\Entity\Site $sites)
    {
        $this->sites->removeElement($sites);
    }

    /**
     * Get sites
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSites()
    {
        return $this->sites;
    }

    /**
     * Set idsite
     *
     * @param \Ynov\LabsBundle\Entity\Site $idsite
     * @return Labs
     */
    public function setIdsite(\Ynov\LabsBundle\Entity\Site $idsite = null)
    {
        $this->idsite = $idsite;

        return $this;
    }

    /**
     * Get idsite
     *
     * @return \Ynov\LabsBundle\Entity\Site 
     */
    public function getIdsite()
    {
        return $this->idsite;
    }
    
}
