<?php

namespace Ynov\LabsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Labs
 *
 * @ORM\Table(name="labs", indexes={@ORM\Index(name="FK_LABS_GERER_UTILISAT", columns={"IDUTILISATEUR"})})
 * @ORM\Entity
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
     * @var string
     *
     * @ORM\Column(name="CODECOULEUR", type="string", length=20, nullable=true)
     */
    private $codecouleur;

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
     * Get id
     *
     * @return integer 
     */
    public function getI()
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
}
