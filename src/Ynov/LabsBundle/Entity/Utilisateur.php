<?php

namespace Ynov\LabsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDUTILISATEUR", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMUTILISATEUR", type="string", length=50, nullable=true)
     */
    private $nomutilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="MEMBRES", type="string", length=500, nullable=true)
     */
    private $membres;

    /**
     * @var string
     *
     * @ORM\Column(name="GOUPE", type="string", length=20, nullable=true)
     */
    private $goupe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ANNEE", type="date", nullable=true)
     */
    private $annee;

    /**
     * @var string
     *
     * @ORM\Column(name="PASSWORD", type="string", length=20, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="ADRESSE", type="string", length=250, nullable=true)
     */
    private $adresse;



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
     * Set nomutilisateur
     *
     * @param string $nomutilisateur
     * @return Utilisateur
     */
    public function setNomutilisateur($nomutilisateur)
    {
        $this->nomutilisateur = $nomutilisateur;

        return $this;
    }

    /**
     * Get nomutilisateur
     *
     * @return string 
     */
    public function getNomutilisateur()
    {
        return $this->nomutilisateur;
    }

    /**
     * Set membres
     *
     * @param string $membres
     * @return Utilisateur
     */
    public function setMembres($membres)
    {
        $this->membres = $membres;

        return $this;
    }

    /**
     * Get membres
     *
     * @return string 
     */
    public function getMembres()
    {
        return $this->membres;
    }

    /**
     * Set goupe
     *
     * @param string $goupe
     * @return Utilisateur
     */
    public function setGoupe($goupe)
    {
        $this->goupe = $goupe;

        return $this;
    }

    /**
     * Get goupe
     *
     * @return string 
     */
    public function getGoupe()
    {
        return $this->goupe;
    }

    /**
     * Set annee
     *
     * @param \DateTime $annee
     * @return Utilisateur
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return \DateTime 
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Utilisateur
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Utilisateur
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }
}
