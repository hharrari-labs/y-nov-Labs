<?php

namespace Ynov\LabsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement", indexes={@ORM\Index(name="FK_EVENEMEN_CREER2_UTILISAT", columns={"IDUTILISATEUR"})})
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDEVENEMENT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="TITRE", type="string", length=250, nullable=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="LIEU", type="string", length=250, nullable=true)
     */
    private $lieu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEEVENEMENT", type="datetime", nullable=true)
     */
    private $dateevenement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATECREATION", type="date", nullable=true)
     */
    private $datecreation;

    /**
     * @var string
     *
     * @ORM\Column(name="LIENEVENEMENT", type="string", length=250, nullable=true)
     */
    private $lienevenement;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPTIONEVENEMENT", type="text", nullable=true)
     */
    private $descriptionevenement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEMAJEVENEMENT", type="date", nullable=true)
     */
    private $datemajevenement;

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
     * Set titre
     *
     * @param string $titre
     * @return Evenement
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     * @return Evenement
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string 
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set dateevenement
     *
     * @param \DateTime $dateevenement
     * @return Evenement
     */
    public function setDateevenement($dateevenement)
    {
        $this->dateevenement = $dateevenement;

        return $this;
    }

    /**
     * Get dateevenement
     *
     * @return \DateTime 
     */
    public function getDateevenement()
    {
        return $this->dateevenement;
    }

    /**
     * Set datecreation
     *
     * @param \DateTime $datecreation
     * @return Evenement
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
     * Set lienevenement
     *
     * @param string $lienevenement
     * @return Evenement
     */
    public function setLienevenement($lienevenement)
    {
        $this->lienevenement = $lienevenement;

        return $this;
    }

    /**
     * Get lienevenement
     *
     * @return string 
     */
    public function getLienevenement()
    {
        return $this->lienevenement;
    }

    /**
     * Set descriptionevenement
     *
     * @param string $descriptionevenement
     * @return Evenement
     */
    public function setDescriptionevenement($descriptionevenement)
    {
        $this->descriptionevenement = $descriptionevenement;

        return $this;
    }

    /**
     * Get descriptionevenement
     *
     * @return string 
     */
    public function getDescriptionevenement()
    {
        return $this->descriptionevenement;
    }

    /**
     * Set datemajevenement
     *
     * @param \DateTime $datemajevenement
     * @return Evenement
     */
    public function setDatemajevenement($datemajevenement)
    {
        $this->datemajevenement = $datemajevenement;

        return $this;
    }

    /**
     * Get datemajevenement
     *
     * @return \DateTime 
     */
    public function getDatemajevenement()
    {
        return $this->datemajevenement;
    }

    /**
     * Set idutilisateur
     *
     * @param \Ynov\LabsBundle\Entity\Utilisateur $idutilisateur
     * @return Evenement
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
