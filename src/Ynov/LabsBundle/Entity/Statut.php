<?php

namespace Ynov\LabsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statut
 *
 * @ORM\Table(name="statut", indexes={@ORM\Index(name="FK_STATUT_CONCERNER_SITE", columns={"IDSITE"}), @ORM\Index(name="FK_STATUT_DISPOSER_LABS", columns={"IDLAB"})})
 * @ORM\Entity
 */
class Statut
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDSTATUT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idstatut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE", type="date", nullable=true)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="ACTIF", type="smallint", nullable=true)
     */
    private $actif;

    /**
     * @var \Site
     *
     * @ORM\ManyToOne(targetEntity="Site")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDSITE", referencedColumnName="IDSITE")
     * })
     */
    private $idsite;

    /**
     * @var \Labs
     *
     * @ORM\ManyToOne(targetEntity="Labs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDLAB", referencedColumnName="IDLAB")
     * })
     */
    private $idlab;



    /**
     * Get idstatut
     *
     * @return integer 
     */
    public function getIdstatut()
    {
        return $this->idstatut;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Statut
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set actif
     *
     * @param integer $actif
     * @return Statut
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return integer 
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set idsite
     *
     * @param \Ynov\LabsBundle\Entity\Site $idsite
     * @return Statut
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

    /**
     * Set idlab
     *
     * @param \Ynov\LabsBundle\Entity\Labs $idlab
     * @return Statut
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
}
