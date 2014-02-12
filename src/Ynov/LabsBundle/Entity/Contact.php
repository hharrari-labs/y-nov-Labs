<?php

namespace Ynov\LabsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity
 */
class Contact
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDCONTACT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcontact;

    /**
     * @var string
     *
     * @ORM\Column(name="EXPEDITEUR", type="string", length=50, nullable=true)
     */
    private $expediteur;

    /**
     * @var string
     *
     * @ORM\Column(name="DESTINATAIRE", type="string", length=50, nullable=true)
     */
    private $destinataire;

    /**
     * @var integer
     *
     * @ORM\Column(name="NEWLETTER", type="smallint", nullable=true)
     */
    private $newletter;



    /**
     * Get idcontact
     *
     * @return integer 
     */
    public function getIdcontact()
    {
        return $this->idcontact;
    }

    /**
     * Set expediteur
     *
     * @param string $expediteur
     * @return Contact
     */
    public function setExpediteur($expediteur)
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    /**
     * Get expediteur
     *
     * @return string 
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

    /**
     * Set destinataire
     *
     * @param string $destinataire
     * @return Contact
     */
    public function setDestinataire($destinataire)
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    /**
     * Get destinataire
     *
     * @return string 
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }

    /**
     * Set newletter
     *
     * @param integer $newletter
     * @return Contact
     */
    public function setNewletter($newletter)
    {
        $this->newletter = $newletter;

        return $this;
    }

    /**
     * Get newletter
     *
     * @return integer 
     */
    public function getNewletter()
    {
        return $this->newletter;
    }
}
